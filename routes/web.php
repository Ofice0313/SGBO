<?php
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('welcome');
});

Route::get('/tela_de_livros', [MaterialController::class, 'tela_de_livros'])->name('tela_de_livros');

