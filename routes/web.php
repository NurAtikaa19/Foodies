<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealTypeController;
use App\Http\Controllers\CartController;

Route::get('/breakfast', [MealTypeController::class, 'index']);
Route::get('/dinner', [MealTypeController::class, 'index']);
Route::get('/Lunch', [MealTypeController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/breakfasts', [MealTypeController::class, 'breakfast'])->name('breakfasts.index');
Route::get('/lunches', [MealTypeController::class, 'lunch'])->name('lunches.index');
Route::get('/dinners', [MealTypeController::class, 'dinner'])->name('dinners.index');

// Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::post('/cart/add', [CartController::class, 'addItem']);
// Route::delete('/cart/remove/{itemId}', [CartController::class, 'removeItem']);
// Route::get('/cart/total', [CartController::class, 'getTotal']);


// Route::get('/cart/{id}/edit', [CartController::class, 'edit'])->name('cart.edit');
// Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
// Route::get('/cart/index', [CartController::class, 'index'])->name('cart.index');

Route::resource('Breakfast', 'CartController');
Route::resource('dinners', 'CartController');
Route::resource('Lunch', 'CartController');
// Route::resource('cart', 'CartController');
Route::get('/cart/index', [CartController::class, 'index'])->name('cart.index');





