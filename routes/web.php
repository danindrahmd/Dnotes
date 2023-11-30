<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BroadcastController;

Route::get('/broadcast/create', [BroadcastController::class, 'create'])->name('broadcast.create');
Route::post('/broadcast/store', [BroadcastController::class, 'store'])->name('broadcast.store');

Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
Route::post('/broadcast-notification', [NotificationController::class, 'broadcast'])->name('broadcast.notification');

// Rute untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rute untuk registrasi
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rute yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    // Rute dashboard
    Route::get('/dashboard', [MemoController::class, 'index'])->name('dashboard');

    // Rute untuk memo
    Route::get('/memo/create', [MemoController::class, 'create'])->name('memo.create');
    Route::post('/memo/store', [MemoController::class, 'store'])->name('memo.store');
    Route::delete('/memo/{id}', [MemoController::class, 'destroy'])->name('memo.destroy');
    Route::get('/memo/{memo}/edit', [MemoController::class, 'edit'])->name('memo.edit');
    Route::put('/memo/{memo}', [MemoController::class, 'update'])->name('memo.update');
    Route::post('/memo/{id}/pin', [MemoController::class, 'pin'])->name('memo.pin');
    Route::post('/memo/{id}/unpin', [MemoController::class, 'unpin'])->name('memo.unpin');

    // Rute untuk logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Rute untuk to-do list
    Route::get('/todo/create', [ToDoController::class, 'create'])->name('todo.create');
    Route::post('/todo', [ToDoController::class, 'store'])->name('todo.store');
    Route::get('/todo/{todo}/edit', [ToDoController::class, 'edit'])->name('todo.edit');
    Route::put('/todo/{todo}', [ToDoController::class, 'update'])->name('todo.update');
    Route::delete('/todo/{todo}', [ToDoController::class, 'destroy'])->name('todo.destroy');
});

// Arahkan rute utama ke rute login
Route::get('/', function () {
    return redirect()->route('login');
});
