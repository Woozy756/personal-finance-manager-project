<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BudgetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Welcome
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Transactions
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

// Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

// Budgets
Route::get('/budgets', [BudgetController::class, 'index'])->name('budgets.index');
Route::get('/budgets/create', [BUdgetController::class, 'create'])->name('budgets.create');

