<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OperatorController;
use App\Models\Customer;

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
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $customers = Customer::all();
    return view('dashboard', compact('customers'));
    
})->name('dashboard');
Route::get('/operators', [OperatorController::class, 'index'])->name('operators');
Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
Route::get('customer/edit/{id}', [CustomerController::class, 'edit']);
Route::post('customer/update/{id}', [CustomerController::class, 'update'])->name('customer-update');
Route::get('customer/delete/{id}', [CustomerController::class, 'destroy']);
Route::post('/customers', [CustomerController::class, 'store'])->name('customer-store');
Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices');
Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoice-store');