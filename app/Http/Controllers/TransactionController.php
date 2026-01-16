<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{

    public function index(Request $request)
    {
        //query
        $query = Transaction::with('category')->latest();

        //filters
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('month')) {
            $date = \Carbon\Carbon::parse($request->month);
            $query->whereYear('transaction_date', $date->year)
                ->whereMonth('transaction_date', $date->month);
        }

        //execute query
        $transactions = $query->get();

        //categories for dropdown
        $categories = $this->getCategories();

        return view('transactions.index', compact('transactions', 'categories'));
    }
    public function create()
    {
        $categories = $this->getCategories();
        return view('transactions.create', compact('categories'));
    }
    private function getCategories()
    {
        return Category::orderBy('name')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'category_id' => 'required|exists:categories,id',
            'transaction_date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        Transaction::create($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully!');
    }
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $categories = Category::all();
        return view('transactions.edit', compact('transaction', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'category_id' => 'required|exists:categories,id',
            'transaction_date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);
        //find and update
        $transaction = Transaction::findOrFail($id);
        $transaction->update($validated);
        //redirect with success message
        return redirect()->route('transactions.index')->with('success', 'Transaction updated!');
    }
    public function destroy($id)
    {
        //find and delete
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        // redirect with success message
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully!');
    }

    public function apiSuggest(Request $request)
    {
        // validate that desctiption exists
        $request->validate(['description' => 'required|string']);

        //ask ai
        $categoryId = $this->guessCategory($request->description);

        //return answer in a json
        return response()->json([
            'category_id' => $categoryId,
            'success' => $categoryId ? true : false
        ]);
    }

    private function guessCategory($description)
    {
        $apiKey = config('services.gemini.key');

        //fetch all categories as a simple list
        $categories = Category::pluck('name')->toArray();
        $categoriesList = implode(', ', $categories);

        // prompt the AI
        $prompt = "I have a transaction description: '{$description}'. 
               Based on this, choose exactly one category from this list: [{$categoriesList}]. 
               Return ONLY the category name. Do not write sentences.";


        $response = Http::withHeaders(['Content-Type' => 'application/json'])
            ->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-3-flash-preview:generateContent?key={$apiKey}", [
                'contents' => [['parts' => [['text' => $prompt]]]]
            ]);

        if ($response->successful()) {
            // extract text
            $aiText = $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? '';

            // clean up
            $guessedName = trim(str_replace(['"', "'", "\n"], '', $aiText));

            // find the category in your database
            $category = Category::where('name', 'LIKE', $guessedName)->first();

            return $category ? $category->id : null;
        }

        return null;
    }
}
