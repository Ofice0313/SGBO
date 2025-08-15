<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\EmprestimoController;
use App\Http\Controllers\Admin\SubcategoriaController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Main;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckLogout;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\{CheckRole, CheckAuth};
use App\Enums\Role;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login']);
Route::post('login_submit', [AuthController::class, 'login_submit'])->name('login_submit');
Route::get('/create', [AuthController::class, 'create']);
Route::post('/cadastrar_usuario', [AuthController::class, 'cadastrar_usuario'])->name('cadastrar_usuario');

//Gestao de cursos
Route::prefix('cursos')->name('cursos.')->group(function () {
    Route::get('/', [CursoController::class, 'index'])->name('index');
    Route::get('/create', [CursoController::class, 'create'])->name('create');
    Route::post('/store', [CursoController::class, 'store'])->name('store');
    Route::get('/{curso}/edit', [CursoController::class, 'edit'])->name('edit');
    Route::put('/{curso}/update', [CursoController::class, 'update'])->name('update');
    Route::get('/{curso}/cursos', [CursoController::class, 'cursos'])->name('cursos');
    Route::delete('/{curso}/destroy', [CursoController::class, 'destroy'])->name('destroy');
});

//Gestao de Usuarios
Route::prefix('cursos')->name('cursos.')->group(function () {
    Route::get('/', [CursoController::class, 'index'])->name('index');
    Route::get('/create', [CursoController::class, 'create'])->name('create');
    Route::post('/store', [CursoController::class, 'store'])->name('store');
    Route::get('/{curso}/edit', [CursoController::class, 'edit'])->name('edit');
    Route::put('/{curso}/update', [CursoController::class, 'update'])->name('update');
    Route::get('/{curso}/cursos', [CursoController::class, 'cursos'])->name('cursos');
    Route::delete('/{curso}/destroy', [CursoController::class, 'destroy'])->name('destroy');
});

// Gestão de Categorias
Route::prefix('categorias')->name('categorias.')->group(function () {
    Route::get('/', [CategoriaController::class, 'index'])->name('index');
    Route::get('/create', [CategoriaController::class, 'create'])->name('create');
    Route::post('/store', [CategoriaController::class, 'store'])->name('store');
    Route::get('/{categoria}/edit', [CategoriaController::class, 'edit'])->name('edit');
    Route::put('/{categoria}/update', [CategoriaController::class, 'update'])->name('update');
    Route::delete('/{categoria}/destroy', [CategoriaController::class, 'destroy'])->name('destroy');
});

//Gestão de subcategorias
Route::prefix('subcategorias')->name('subcategorias.')->group(function () {
    Route::get('/', [SubcategoriaController::class, 'index'])->name('index');
    Route::get('/create', [SubcategoriaController::class, 'create'])->name('create');
    Route::post('/store', [SubcategoriaController::class, 'store'])->name('store');
    Route::get('/{subcategoria}/edit', [SubcategoriaController::class, 'edit'])->name('edit');
    Route::put('/{subcategoria}/update', [SubcategoriaController::class, 'update'])->name('update');
    Route::delete('/{subcategoria}/destroy', [SubcategoriaController::class, 'destroy'])->name('destroy');
});

//Gestão de Empréstimos

// Route::get('/', [EmprestimoController::class, 'index'])->name('index');
// Route::get('/create', [EmprestimoController::class, 'create'])->name('create');
// Route::post('/store', [EmprestimoController::class, 'store'])->name('store');
// Route::get('/{emprestimo}/edit', [EmprestimoController::class, 'edit'])->name('edit');
// Route::put('/{emprestimo}/update', [EmprestimoController::class, 'update'])->name('update');
// Route::delete('/{emprestimo}/destroy', [EmprestimoController::class, 'destroy'])->name('destroy');
// Route::patch('/emprestimos/{id}/aprovar', [EmprestimoController::class, 'aprovar'])->name('emprestimos.aprovar');
// Route::patch('/emprestimos/{id}/rejeitar', [EmprestimoController::class, 'rejeitar'])->name('emprestimos.rejeitar');
// Route::get('/materiais/{id}/disponibilidade', [EmprestimoController::class, 'verificarDisponibilidade'])->name('materiais.verificarDisponibilidade');


Route::group(['middleware' => 'Admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    //Materias 
    Route::prefix('materiais')->name('materiais.')->group(function () {
        Route::get('/materiais', [MaterialController::class, 'index'])->name('index');
        Route::get('/create', [MaterialController::class, 'create'])->name('create');
        Route::get('/tela_de_livros', [MaterialController::class, 'tela_de_livros'])->name('tela_de_livros');
        Route::post('/store', [MaterialController::class, 'store'])->name('store');
        Route::get('/{material}/edit', [MaterialController::class, 'edit'])->name('edit');
        Route::put('/{material}/update', [MaterialController::class, 'update'])->name('update');
        Route::delete('/{material}/destroy', [MaterialController::class, 'destroy'])->name('destroy');
    });

    //Cursos

    Route::prefix('cursos')->name('cursos.')->group(function () {
        Route::get('/cursos', [CursoController::class, 'index'])->name('index');
        Route::get('/create', [CursoController::class, 'create'])->name('create');
        Route::post('/store', [CursoController::class, 'store'])->name('store');
        Route::get('/{curso}/edit', [CursoController::class, 'edit'])->name('edit');
        Route::put('/{curso}', [CursoController::class, 'update'])->name('update');
        Route::get('/cursos', [CursoController::class, 'cursos'])->name('cursos');
        Route::delete('/{curso}', [CursoController::class, 'destroy'])->name('destroy');
    });

    //Usuarios
    Route::prefix('usuarios')->name('usuarios.')->group(function() {
        Route::get('/', [UsuarioController::class, 'index'])->name('index');
        Route::get('/create', [UsuarioController::class, 'create'])->name('create');
        Route::post('/store', [UsuarioController::class, 'store'])->name('store');
        Route::get('/{usuario}/edit', [UsuarioController::class, 'edit'])->name('edit');
        Route::put('/{usuario}', [UsuarioController::class, 'update'])->name('update');
        Route::get('/usuarios', [UsuarioController::class, 'usuarios'])->name('usuarios');
        Route::delete('/{usuarios}', [UsuarioController::class, 'destroy'])->name('destroy');
    });

    //Categorias
    Route::prefix('categorias')->name('categorias.')->group(function() {
        Route::get('/', [CategoriaController::class, 'index'])->name('index');
        Route::get('/create', [CategoriaController::class, 'create'])->name('create');
        Route::post('/store', [CategoriaController::class, 'store'])->name('store');
        Route::get('/{categoria}/edit', [CategoriaController::class, 'edit'])->name('edit');
        Route::put('/{categoria}', [CategoriaController::class, 'update'])->name('update');
        Route::get('/categorias', [CategoriaController::class, 'categorias'])->name('categorias');
        Route::delete('/{categoria}/destroy', [CategoriaController::class, 'destroy'])->name('destroy');
    });

    //Subcategorias
    Route::prefix('subcategorias')->name('subcategorias.')->group(function() {
        Route::get('/', [SubcategoriaController::class, 'index'])->name('index');
        Route::get('/create', [SubcategoriaController::class, 'create'])->name('create');
        Route::post('/store', [SubcategoriaController::class, 'store'])->name('store');
        Route::get('/{subcategoria}/edit', [SubcategoriaController::class, 'edit'])->name('edit');
        Route::put('/{subcategoria}', [SubcategoriaController::class, 'update'])->name('update');
        Route::get('/subcategorias', [SubcategoriaController::class, 'subcategorias'])->name('subcategorias');
        Route::delete('/{subcategoria}', [SubcategoriaController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('adminemprestimos')->name('adminemprestimos.')->group(function() {
        Route::put('emprestimos/{id}/validar', [EmprestimoController::class, 'validar'])->name('validar');
        Route::get('/emprestimos', [EmprestimoController::class, 'emprestimos'])->name('emprestimos');
        Route::post('/emprestimos/{id}/confirmar-devolucao', [EmprestimoController::class, 'confirmarDevolucao'])->name('confirmarDevolucao');
        Route::put('{id}/entregar', [EmprestimoController::class, 'entregar'])->name('entregar');
        Route::put('/{id}/aceitarPedidoDeDevolucao', [EmprestimoController::class, 'aceitarPedidoDeDevolucao'])->name('aceitarPedidoDeDevolucao');
        Route::put('/{id}/confirmarDevolucao', [EmprestimoController::class, 'confirmarDevolucao'])->name('confirmarDevolucao');
    });
});

Route::group(['middleware' => 'User'], function(){
    Route::get('user/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::prefix('emprestimos')->name('emprestimos.')->group(function() {
        Route::get('/solicitar', [EmprestimoController::class, 'criar'])->name('criar');
        Route::post('/solicitar', [EmprestimoController::class, 'solicitar'])->name('solicitar');
        Route::put('/{id}/confirmarLevantamento', [EmprestimoController::class, 'confirmarLevantamento'])->name('confirmarLevantamento');
        Route::put('/{id}/Levantar', [EmprestimoController::class, 'Levantar'])->name('Levantar');
        Route::put('/{id}/solicitarDevolucao', [EmprestimoController::class, 'solicitarDevolucao'])->name('solicitarDevolucao');
        Route::put('/{id}/devolver', [EmprestimoController::class, 'devolver'])->name('devolver');
        Route::get('/meus-emprestimos', [EmprestimoController::class, 'meus_emprestimos'])->name('meus_emprestimos');
    });
    
});

Route::get('forgot', [AuthController::class, 'forgot']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/tela_de_livros', [MaterialController::class, 'tela_de_livros'])->name('tela_de_livros');
