<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Budget;
use App\Models\Category;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        $budgets = Budget::with('category')->get();

        foreach ($budgets as $budget) {
            //sum of each categories transactions this month
            $budget->spent = Transaction::where('category_id', $budget->category_id)
                ->whereMonth('transaction_date', now()->month)
                ->whereYear('transaction_date', now()->year)
                ->sum('amount');
            $budget->remaining = $budget->amount - $budget->spent;
            $budget->percentage = ($budget->amount > 0) ? ($budget->spent / $budget->amount) * 100 : 0;
        }

        return view('budgets.index', compact('budgets'));
    }
    public function create()
    {
        //fetch categories without a budget
        $categories = Category::where('type', 'expense')
            ->whereDoesntHave('budget')
            ->get();

        return view('budgets.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id|unique:budgets,category_id',
            'amount' => 'required|numeric|min:1',
        ], ['category_id.required' => 'Please select a category for this budget.']);
        Budget::create($validated);
        return redirect()->route('budgets.index')->with('success', 'Monthly budget set successfully!');
    }
    public function edit(Budget $budget)
    {
        //allows to only edit the budget not the category
        return view('budgets.edit', compact('budget'));
    }

    public function update(Request $request, Budget $budget)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $budget->update($validated);

        return redirect()->route('budgets.index')->with('success', 'Budget updated successfully!');
    }

    public function destroy(Budget $budget)
    {
        $budget->delete();

        return redirect()->route('budgets.index')
            ->with('success', 'Budget removed successfully.');
    }

}
