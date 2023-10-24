<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemoController;

// Rute untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rute untuk registrasi
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rute yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    // Rute dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Tambahkan rute untuk menambahkan memo
    Route::get('/memo/create', [MemoController::class, 'create'])->name('memo.create');
    Route::post('/memo/store', [MemoController::class, 'store'])->name('memo.store');
    Route::delete('/memo/{id}', [MemoController::class, 'destroy'])->name('memo.destroy');

    // Rute untuk logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Arahkan rute utama ke rute login
Route::get('/', function () {
    return redirect()->route('login');
});
