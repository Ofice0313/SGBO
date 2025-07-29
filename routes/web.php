<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\EmprestimoController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Main;
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

// Route::group(['middleware' => ['auth']], function () {
//     Route::prefix('admin')->name('admin.')->group(function(){
//         Route::prefix('materiais')->name('materiais.')->group(function(){
//             Route::get('/', [MaterialController::class, 'index'])->name('index');
//             Route::get('/create', [MaterialController::class, 'create'])->name('create');
//             Route::get('/tela_de_livros', [MaterialController::class, 'tela_de_livros'])->name('tela_de_livros');
//             Route::post('/store', [MaterialController::class, 'store'])->name('store');
//         });    
//     });
// });

Route::prefix('admin')->name('admin.')->group(function(){
        Route::prefix('materiais')->name('materiais.')->group(function(){
            Route::get('/', [MaterialController::class, 'index'])->name('index');
            Route::get('/create', [MaterialController::class, 'create'])->name('create');
            Route::get('/tela_de_livros', [MaterialController::class, 'tela_de_livros'])->name('tela_de_livros');
            Route::post('/store', [MaterialController::class, 'store'])->name('store');
            Route::get('/{material}/edit', [MaterialController::class, 'edit'])->name('edit');
            Route::put('/{material}/update', [MaterialController::class, 'update'])->name('update');
            Route::delete('/{material}/destroy', [MaterialController::class, 'destroy'])->name('destroy');
        });
        
        Route::prefix('dashboard')->name('dashboard.')->group(function(){
            Route::get('/admin', [Main::class, 'dashboard_admin'])->name('dashboard_admin');
        });

        Route::prefix('cursos')->name('cursos.')->group(function(){
            Route::get('/', [CursoController::class, 'index'])->name('index');
            Route::get('/create', [CursoController::class, 'create'])->name('create');
            Route::post('/store', [CursoController::class, 'store'])->name('store');
            Route::get('/{curso}/edit', [CursoController::class, 'edit'])->name('edit');
            Route::put('/{curso}/update', [CursoController::class, 'update'])->name('update');
            Route::get('/{curso}/cursos', [CursoController::class, 'cursos'])->name('cursos');
            Route::delete('/{curso}/destroy', [CursoController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('usuarios')->name('usuarios.')->group(function(){
            Route::get('/', [UsuarioController::class, 'usuarios'])->name('index');
            Route::get('/create', [UsuarioController::class, 'create'])->name('create');
            Route::post('/store', [UsuarioController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [UsuarioController::class, 'edit'])->name('edit');
            Route::put('/{id}/update', [UsuarioController::class, 'update'])->name('update');
            Route::delete('/{id}/destroy', [UsuarioController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('categorias')->name('categorias.')->group(function(){
            Route::get('/', [CategoriaController::class, 'index'])->name('index');
            Route::get('/create', [CategoriaController::class, 'create'])->name('create');
            Route::post('/store', [CategoriaController::class, 'store'])->name('store');
            Route::get('/{categoria}/edit', [CategoriaController::class, 'edit'])->name('edit');
            Route::put('/{categoria}/update', [CategoriaController::class, 'update'])->name('update');
            Route::delete('/{categoria}/destroy', [CategoriaController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('emprestimos')->name('emprestimos.')->group(function(){
            Route::get('/', [EmprestimoController::class, 'index'])->name('index');
            Route::get('/create', [EmprestimoController::class, 'create'])->name('create');
            Route::post('/store', [EmprestimoController::class, 'store'])->name('store');
            Route::get('/{emprestimo}/edit', [EmprestimoController::class, 'edit'])->name('edit');
            Route::put('/{emprestimo}/update', [EmprestimoController::class, 'update'])->name('update');
            Route::delete('/{emprestimo}/destroy', [EmprestimoController::class, 'destroy'])->name('destroy');
        });
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware([VerificaAdmin::class])->group(function (){
//     Route::get('/admin', function (){
//         return view('admin.dashboard');
//     });
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', fn() => view('dashboard'));
// });


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
