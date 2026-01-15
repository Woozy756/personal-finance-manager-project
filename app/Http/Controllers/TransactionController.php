<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;

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
}
