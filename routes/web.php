<?php
use App\Http\Controllers\Admin\MaterialController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('welcome');
});

// Route::get('/materiais', [MaterialController::class, 'index'])->name('materiais.index');
// Route::get('/materiais/{material}', [MaterialController::class, 'visualizar'])->name('materiais.visualizar');
// Route::get('/materiais/{material}/pdf', [MaterialController::class, 'viewPdf'])->name('materiais.view-pdf');
// Route::get('/material/{material}/audio', [MaterialController::class, 'streamAudio'])->name('materiais.stream-audio');

// // Rotas para admin
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::post('/books', [MaterialController::class, 'store'])->name('materiais.store');
//     Route::get('/admin/books/create', [MaterialController::class, 'create'])->name('materiais.create');
// });

Route::prefix('admin')->name('admin.')->group(function(){
    Route::prefix('materiais')->name('materiais.')->group(function(){
        Route::get('/', [MaterialController::class, 'index'])->name('index');
        Route::get('/create', [MaterialController::class, 'create'])->name('create');
        Route::get('/tela_de_livros', [MaterialController::class, 'tela_de_livros'])->name('tela_de_livros');
        Route::post('/store', [MaterialController::class, 'store'])->name('store');
    });    
});