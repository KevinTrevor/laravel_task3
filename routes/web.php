<?php

use App\Http\Controllers\AmazonGoutteController;
use App\Http\Controllers\ExpensesController;
use App\Http\Livewire\CreateProduct;
use App\Http\Livewire\IndexProduct;
use App\Http\Livewire\ShowProduct;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/products', IndexProduct::class);
    Route::get('/products/create', CreateProduct::class);
    Route::get('/products/{product}', ShowProduct::class);

    Route::get('/prices', [ExpensesController::class, 'index'])->name('expenses.index');
});
