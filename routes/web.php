<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'task1'],function(){
    Route::get('checkout-page',[TransactionController::class,'checkoutPage'])->name('checkoutPage');
    Route::post('create-transaction',[TransactionController::class,'createTransaction']);
    Route::get('transactions-page',[TransactionController::class,'transactionsPage'])->name('transactionsPage');
    Route::get('get-transactions',[TransactionController::class,'getTransactions'])->name('getTransactions');
});

Route::group(['prefix' => 'task2'],function(){
    Route::get('products-page',[ProductController::class,'productsPage'])->name('productsPage');
    Route::get('get-products',[ProductController::class,'getProducts'])->name('getProducts');
});