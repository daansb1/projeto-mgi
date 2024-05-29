<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Contas
Route::get('/index-conta', [App\Http\Controllers\ContaController::class, 'index'])->name('conta.index');
Route::get('/create-conta', [App\Http\Controllers\ContaController::class, 'create'])->name('conta.create');
Route::post('/store-conta', [App\Http\Controllers\ContaController::class, 'store'])->name('conta.store');
Route::get('/show-conta/{conta}', [App\Http\Controllers\ContaController::class, 'show'])->name('conta.show');
Route::get('/edit-conta/{conta}', [App\Http\Controllers\ContaController::class, 'edit'])->name('conta.edit');
Route::put('/update-conta/{conta}', [App\Http\Controllers\ContaController::class, 'update'])->name('conta.update');
Route::delete('/destroy-conta/{conta}', [App\Http\Controllers\ContaController::class, 'destroy'])->name('conta.destroy');
