<?php

use App\Http\Controllers\BracketController;
use App\Http\Controllers\PalindromeController;
use App\Http\Controllers\WeightedStringController;
use Illuminate\Support\Facades\Route;

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

Route::get('/check-weights', [WeightedStringController::class, 'test']);
Route::post('/check-balanced', [BracketController::class, 'isBalanced']);
Route::post('/highest-palindrome', [PalindromeController::class, 'highestPalindrome']);
