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
use App\Http\Controllers\Admin\RelatorioController;



use App\Http\Middleware\{CheckRole, CheckAuth};
use App\Enums\Role;
use App\Http\Controllers\Admin\LivroController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ConfiguracoesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogsController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login_submit', [AuthController::class, 'login_submit'])->name('login_submit');
Route::get('/create', [AuthController::class, 'create']);
Route::post('/cadastrar_usuario', [AuthController::class, 'cadastrar_usuario'])->name('cadastrar_usuario');
Route::get('/resetPasswordForm', [AuthController::class, 'resetPasswordForm'])->name('reset
passwordForm');
Route::post('/resetPassword', [AuthController::class, 'resetPassword'])->name('resetPassword');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'Admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    //Materias 
    Route::prefix('materiais')->name('materiais.')->group(function () {
        Route::get('/materiais', [LivroController::class, 'index'])->name('index');
        Route::get('/create', [LivroController::class, 'create'])->name('create');
        Route::get('/tela_de_livros', [LivroController::class, 'tela_de_livros'])->name('tela_de_livros');
        Route::post('/store', [LivroController::class, 'store'])->name('store');
        Route::get('/{material}/edit', [LivroController::class, 'edit'])->name('edit');
        Route::put('/{material}/update', [LivroController::class, 'update'])->name('update');
        Route::delete('/{material}/destroy', [LivroController::class, 'destroy'])->name('destroy');
    });

    //Cursos

    Route::prefix('cursos')->name('cursos.')->group(function () {
        Route::get('/cursos', [CursoController::class, 'index'])->name('index');
        Route::get('/create', [CursoController::class, 'create'])->name('create');
        Route::post('/store', [CursoController::class, 'store'])->name('store');
        Route::get('/{curso}/edit', [CursoController::class, 'edit'])->name('edit');
        Route::put('/{curso}', [CursoController::class, 'update'])->name('update');
        //Route::get('/cursos', [CursoController::class, 'cursos'])->name('cursos');
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

    Route::prefix('relatorio')->name('relatorio.')->group(function() {
        Route::get('/relatorio', [RelatorioController::class, 'index'])->name('index');
        Route::get('/relatorio/emprestimos/pdf', [RelatorioController::class, 'emprestimosPdf'])->name('emprestimos.pdf');
    });

    Route::prefix('configuracoes')->name('configuracoes.')->group(function (){
        Route::get('/configuracoes', [ConfiguracoesController::class, 'index'])->name('index');
        Route::post('/promover/{user}', [ConfiguracoesController::class, 'promover'])->name('promover');
        Route::post('/despromover/{user}', [ConfiguracoesController::class, 'despromover'])->name('despromover');
    });

    Route::prefix('logs')->name('logs.')->group(function (){
        Route::get('/logs', [LogsController::class, 'index'])->name('index');
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

// // Forgot password
// Route::get('/forgot-password', function () {
//     return view('auth.forgot_password');
// })->name('forgot_password');


Route::get('/tela_de_livros', [LivroController::class, 'tela_de_livros'])->name('tela_de_livros');

Route::get('/books', [BookController::class, 'books'])->name('books');
Route::get('/{id}/visualizar', [LivroController::class, 'visualizarLivro'])->name('visualizarLivro');
Route::get('/view-pdf/{id}', [LivroController::class, 'view'])->name('view.pdf');
   

// Visualizar conteúdo do livro sem download/cópia
Route::get('/books/{id}/visualizar', [LivroController::class, 'visualizarLivro'])->name('books.visualizar');

Route::get('/view-pdf/{id}', [LivroController::class, 'view'])->name('view.pdf');
// // Relatório do admin
// Route::get('relatorio', [RelatorioController::class, 'index'])->name('relatorio.index');
// Route::get('relatorio/emprestimos/pdf', [RelatorioController::class, 'emprestimosPdf'])->name('relatorio.emprestimos.pdf');