<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use App\Models\Budget;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        //get the start and end of this month
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // caculate monthly transactions
        $totalIncome = Transaction::whereHas('category', function ($query) {
            $query->where('type', 'income');
        })
            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $totalExpenses = Transaction::whereHas('category', function ($query) {
            $query->where('type', 'expense');
        })
            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $netBalance = $totalIncome - $totalExpenses;

        // fetch recent transactions
        $recentTransactions = Transaction::with('category')
            ->latest('transaction_date')
            ->take(5)
            ->get();
        
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

        return view('welcome', compact('totalIncome', 'totalExpenses', 'netBalance', 'recentTransactions', 'budgets'));
    }
}
