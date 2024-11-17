<?php

use App\Http\Controllers\UserController;

Route::get('/form', [UserController::class, 'formPage'])->name('form.page');
Route::post('/form', [UserController::class, 'store'])->name('form.store');
Route::get('/table', [UserController::class, 'tablePage'])->name('table.page');
Route::post('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

Route::get('/', function () {
    return view('welcome');
});
