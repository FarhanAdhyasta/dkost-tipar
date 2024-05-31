<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardRoomController;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\DashboardTransactionController;

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



// Route for public homepage
Route::get('/', [HomeController::class, 'beranda']);
Route::get('/tentang', [HomeController::class, 'tentang']);
Route::get('/kamar', [RoomController::class, 'index'])->name('kamar');
Route::get('/kamar/{room:slug}', [RoomController::class, 'detail']);



// Route for dashboard 
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('/dashboard/kamar', DashboardRoomController::class);
    Route::resource('/dashboard/pengguna', DashboardUsersController::class);
    Route::resource('/dashboard/transaksi', DashboardTransactionController::class);
});


Route::get('/timezone', function () {
    return now();
});


// Route for user profile (accessible only for authenticated users)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/beranda', [HomeController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/riwayat', [HomeController::class, 'riwayat'])->name('profile.riwayat');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('transaksi/{room:slug}', [TransactionController::class, 'index']);
    Route::post('order', [TransactionController::class, 'order']);
});

// Authentication routes
require __DIR__.'/auth.php';
