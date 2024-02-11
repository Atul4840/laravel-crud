<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\POSController;

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
Route::resource('products', ProductController::class);
Route::get('/pos', [POSController::class, 'index'])->name('pos.index');

Route::post('/pos/save-transaction', [POSController::class, 'saveTransaction'])->name('pos.saveTransaction');
Route::get('/pos/invoices', [PosController::class, 'invoices'])->name('pos.invoices');


