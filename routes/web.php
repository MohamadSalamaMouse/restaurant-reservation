<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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


Route::get("/",[HomeController::class,'index']);
Route::get('redirects',[HomeController::class,'redirects']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('users', [AdminController::class, 'index'])->name('users');
    Route::post('user/destroy/{id}', [AdminController::class, 'destroy'])->name('user.destroy');
    Route::get('FoodMenu', [AdminController::class, 'FoodMenu'])->name('FoodMenu');
    Route::post('food/store', [AdminController::class, 'food_store'])->name('food.store');
    Route::post('food/destroy/{id}', [AdminController::class, 'food_destroy'])->name('FoodMenu.destroy');
    Route::get('Food/edit/{id}', [AdminController::class, 'Food_edit'])->name('FoodMenu.edit');
Route::post('food/update/{id}', [AdminController::class, 'Food_update'])->name('food.update');
});
