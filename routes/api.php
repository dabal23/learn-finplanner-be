<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncomeRecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::get('/', function(){return 'halo';});

Route::post('/register', [authController::class, 'register']);
Route::post('/login', [authController::class, 'login']);
Route::post('/logout', [authController::class, 'logout']);



Route::apiResource('category', CategoryController::class);

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('budget', BudgetController::class);
    Route::apiResource('income', IncomeRecordController::class);
});