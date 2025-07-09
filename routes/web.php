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

// login routes
Route::get('/login', [Main::class, 'login'])->name('login');
Route::post('/login_submit', [Main::class, 'login_submit'])->name('login_submit');

// New register users
Route::get('/register_users', [Main::class, 'register_users'])->name('register_users');
Route::post('/register_submit_users', [Main::class, 'register_submit_users'])->name('register_submit_users');
