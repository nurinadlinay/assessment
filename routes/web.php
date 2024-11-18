<?php

use App\Http\Controllers\UserController;

// Redirect root route ("/") to the form page
Route::get('/', [UserController::class, 'create'])->name('user.create');
Route::post('/store', [UserController::class, 'store'])->name('user.store');
Route::get('/table', [UserController::class, 'index'])->name('user.index');
Route::post('/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
