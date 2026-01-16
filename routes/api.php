<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Default Sanctum Route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * AI Category Suggestion Route
 * URL will be: your-domain.com/api/suggest-category
 */
Route::post('/suggest-category', [TransactionController::class, 'apiSuggest']);