<?php

use App\Http\Controllers\AffiliateUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
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
})->middleware(['auth:web,admin,affiliate', 'verified'])->name('dashboard');

Route::middleware(['auth:web,admin,affiliate',])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth:admin,affiliate',])->group(function () {
    Route::resource('/users/affiliate', AffiliateUserController::class);
});

Route::middleware(['auth:web',])->group(function () {
    Route::resource('/transaction', TransactionController::class);
});


require __DIR__ . '/auth.php';
