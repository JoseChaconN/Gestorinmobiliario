<?php

use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CustomerBankAccountController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::match(['get','post'],'/customer/list', [CustomerController::class, 'list'])->middleware(['auth', 'verified'])->name('customer.list');
Route::get('customer/search', [CustomerController::class, 'search'])->name('customer.search')->middleware(['auth', 'verified']);
Route::resource('customer', CustomerController::class)->middleware(['auth', 'verified']);

Route::get('customer-bank-account/search/', [CustomerBankAccountController::class, 'search'])->name('customer-bank-account.search')->middleware(['auth', 'verified']);
Route::resource('customer-bank-account', CustomerBankAccountController::class)->middleware(['auth', 'verified']);
Route::post('customer-bank-account/{id}/delete', [CustomerBankAccountController::class, 'delete'])->name('customer-bank-account.delete')->middleware(['auth', 'verified']);

Route::resource('property', PropertyController::class)->middleware(['auth', 'verified']);

Route::resource('community', CommunityController::class)->middleware(['auth', 'verified']);