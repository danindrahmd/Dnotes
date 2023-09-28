<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', [FormController::class, 'index'])->name('form.index');
Route::post('/submit', [FormController::class, 'submitForm'])->name('form.submit');
Route::get('/result', [FormController::class, 'showResult'])->name('form.result');
