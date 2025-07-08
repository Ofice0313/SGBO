<?php

use App\Http\Controllers\Main;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   
});

// New register
Route::get('/register', [Main::class, 'register'])->name('register');
Route::post('/new_register_submit', [Main::class, 'new_register_submit'])->name('new_register_submit');

// table
Route::get('/index', [Main::class, 'index'])->name('index');
// Form de editar
Route::get('/material/{id}/edit', [Main::class, 'edit'])->name('edit');

// Atualizar material
Route::post('/material/{id}/update', [Main::class, 'update'])->name('update');

// Deletar material
Route::post('/material/{id}/delete', [Main::class, 'delete'])->name('delete');
