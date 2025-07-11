<?php

use App\Http\Controllers\Main;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckLogout;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   
});

// in app
Route::middleware(CheckLogin::class)->group(function(){
    Route::get('/', [Main::class, 'index'])->name('index');

    // New register
    Route::get('/register_materiais', [Main::class, 'register_materiais'])->name('register_materiais');
    Route::post('/new_register_submit', [Main::class, 'new_register_submit'])->name('new_register_submit');
    // Form de editar
    Route::get('/material/{id}/edit_materiais', [Main::class, 'edit_materiais'])->name('edit_materiais');

    // Atualizar material
    Route::post('/material/{id}/update', [Main::class, 'update'])->name('update');

    // Deletar material
    Route::post('/material/{id}/delete', [Main::class, 'delete'])->name('delete');

});

// out app
Route::middleware(CheckLogout::class)->group(function(){
    // login routes
    Route::get('/login', [Main::class, 'login'])->name('login');
    Route::post('/login_submit', [Main::class, 'login_submit'])->name('login_submit');
});

Route::get('/dashboard', [Main::class, 'dashboard'])->name('dashboard');

// New register users
Route::get('/register_users', [Main::class, 'register_users'])->name('register_users');
Route::post('/register_submit_users', [Main::class, 'register_submit_users'])->name('register_submit_users');
