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

// Route::middleware([CheckLogout::class])->group(function () {
//     Route::get('/login', [LoginController::class, 'login'])->name('login');
//     Route::post('/login_submit', [LoginController::class, 'login_submit'])->name('login_submit');
// });
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas públicas
// Route::get('/login', [LoginController::class, 'login'])->name('login');
// Route::post('/login', [LoginController::class, 'login_submit'])->name('login.submit');

// // Rotas protegidas
// Route::middleware([CheckAuth::class])->group(function () {
//     Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//     // Rotas de Admin
//     Route::middleware([CheckRole::class . ':ADMIN'])
//         ->prefix('admin')
//         ->name('admin.')
//         ->group(function () {
//             Route::get('/dashboard', function () {
//                 return view('admin.dashboard.dashboard_admin.dashboard_visao_geral');
//             })->name('dashboard');
//         });

//     // Rotas de User
//     Route::middleware([CheckRole::class . ':USER'])
//         ->prefix('user')
//         ->name('user.')
//         ->group(function () {
//             Route::get('/tela_de_livros', function () {
//                 return view('tela_de_livros');
//             })->name('tela_de_livros');
//         });
// });

// Rota raiz
// Route::get('/', function () {
//     return redirect()->route('login');
// })->name('home');

Route::get('/login', [AuthController::class, 'login']);
Route::post('login_submit', [AuthController::class, 'login_submit'])->name('login_submit');
Route::get('/create', [AuthController::class, 'create']);
Route::post('/cadastrar_usuario', [AuthController::class, 'cadastrar_usuario'])->name('cadastrar_usuario');

Route::group(['middleware' => 'Admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware' => 'User'], function(){
    Route::get('user/dashboard', [DashboardController::class, 'dashboard']);
});

// // Rotas públicas
// Route::get('/login', [LoginController::class, 'login'])->name('login');
// Route::post('/login_submit', [LoginController::class, 'login_submit'])->name('login_submit');
// Route::middleware([CheckAuth::class])->group(function () {

//     // Logout (disponível para todos os usuários autenticados)
//     // Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//     // ===== ROTAS EXCLUSIVAS PARA ADMIN =====
//     Route::middleware([CheckRole::class . ':' . Role::Admin->value])
//         ->prefix('admin')
//         ->name('admin.')
//         ->group(function () {

//             // Dashboard Admin
//             Route::prefix('dashboard')->name('dashboard.')->group(function () {
//                 Route::get('/admin', [Main::class, 'dashboard_admin'])->name('dashboard_admin');
//             });

//             // Gestão de Materiais
//             Route::prefix('materiais')->name('materiais.')->group(function () {
//                 Route::get('/', [MaterialController::class, 'index'])->name('index');
//                 Route::get('/create', [MaterialController::class, 'create'])->name('create');
//                 Route::get('/tela_de_livros', [MaterialController::class, 'tela_de_livros'])->name('tela_de_livros');
//                 Route::post('/store', [MaterialController::class, 'store'])->name('store');
//                 Route::get('/{material}/edit', [MaterialController::class, 'edit'])->name('edit');
//                 Route::put('/{material}/update', [MaterialController::class, 'update'])->name('update');
//                 Route::delete('/{material}/destroy', [MaterialController::class, 'destroy'])->name('destroy');
//             });

//             // Gestão de Cursos
//             Route::prefix('cursos')->name('cursos.')->group(function () {
//                 Route::get('/', [CursoController::class, 'index'])->name('index');
//                 Route::get('/create', [CursoController::class, 'create'])->name('create');
//                 Route::post('/store', [CursoController::class, 'store'])->name('store');
//                 Route::get('/{curso}/edit', [CursoController::class, 'edit'])->name('edit');
//                 Route::put('/{curso}/update', [CursoController::class, 'update'])->name('update');
//                 Route::get('/{curso}/cursos', [CursoController::class, 'cursos'])->name('cursos');
//                 Route::delete('/{curso}/destroy', [CursoController::class, 'destroy'])->name('destroy');
//             });

//             // Gestão de Usuários
//             Route::prefix('usuarios')->name('usuarios.')->group(function () {
//                 Route::get('/', [UsuarioController::class, 'usuarios'])->name('index');
//                 Route::get('/create', [UsuarioController::class, 'create'])->name('create');
//                 Route::post('/store', [UsuarioController::class, 'store'])->name('store');
//                 Route::get('/{id}/edit', [UsuarioController::class, 'edit'])->name('edit');
//                 Route::put('/{id}/update', [UsuarioController::class, 'update'])->name('update');
//                 Route::delete('/{id}/destroy', [UsuarioController::class, 'destroy'])->name('destroy');
//             });

//             // Gestão de Categorias
//             Route::prefix('categorias')->name('categorias.')->group(function () {
//                 Route::get('/', [CategoriaController::class, 'index'])->name('index');
//                 Route::get('/create', [CategoriaController::class, 'create'])->name('create');
//                 Route::post('/store', [CategoriaController::class, 'store'])->name('store');
//                 Route::get('/{categoria}/edit', [CategoriaController::class, 'edit'])->name('edit');
//                 Route::put('/{categoria}/update', [CategoriaController::class, 'update'])->name('update');
//                 Route::delete('/{categoria}/destroy', [CategoriaController::class, 'destroy'])->name('destroy');
//             });

//             // Gestão de Subcategorias
//             Route::prefix('subcategorias')->name('subcategorias.')->group(function () {
//                 Route::get('/', [SubcategoriaController::class, 'index'])->name('index');
//                 Route::get('/create', [SubcategoriaController::class, 'create'])->name('create');
//                 Route::post('/store', [SubcategoriaController::class, 'store'])->name('store');
//                 Route::get('/{subcategoria}/edit', [SubcategoriaController::class, 'edit'])->name('edit');
//                 Route::put('/{subcategoria}/update', [SubcategoriaController::class, 'update'])->name('update');
//                 Route::delete('/{subcategoria}/destroy', [SubcategoriaController::class, 'destroy'])->name('destroy');
//             });

//             // Gestão de Empréstimos
//             Route::prefix('emprestimos')->name('emprestimos.')->group(function () {
//                 Route::get('/', [EmprestimoController::class, 'index'])->name('index');
//                 Route::get('/create', [EmprestimoController::class, 'create'])->name('create');
//                 Route::post('/store', [EmprestimoController::class, 'store'])->name('store');
//                 Route::get('/{emprestimo}/edit', [EmprestimoController::class, 'edit'])->name('edit');
//                 Route::put('/{emprestimo}/update', [EmprestimoController::class, 'update'])->name('update');
//                 Route::delete('/{emprestimo}/destroy', [EmprestimoController::class, 'destroy'])->name('destroy');
//             });
//         });

//     // ===== ROTAS EXCLUSIVAS PARA USER =====
//     Route::middleware([CheckRole::class . ':' . Role::User->value])
//         ->prefix('user')
//         ->name('user.')
//         ->group(function () {

//             // Dashboard do usuário
//             //Route::get('/dashboard', [Main::class, 'dashboard_user'])->name('dashboard');

//             // Visualização de livros
//             Route::get('/tela_de_livros', [MaterialController::class, 'tela_de_livros'])->name('tela_de_livros');

//             // Meus empréstimos
//             Route::prefix('emprestimos')->name('emprestimos.')->group(function () {
//                 Route::get('/', [EmprestimoController::class, 'meus_emprestimos'])->name('index');
//                 Route::post('/solicitar', [EmprestimoController::class, 'solicitar'])->name('solicitar');
//             });

//             // Perfil do usuário
//             // Route::prefix('perfil')->name('perfil.')->group(function () {
//             //     Route::get('/', [UsuarioController::class, 'perfil'])->name('index');
//             //     Route::put('/update', [UsuarioController::class, 'update_perfil'])->name('update');
//             // });
//         });

//     // ===== ROTAS COMPARTILHADAS (ADMIN E USER) =====
//     // Route::middleware([CheckRole::class . ':' . Role::Admin->value . ',' . Role::User->value])
//     //     ->prefix('shared')
//     //     ->name('shared.')
//     //     ->group(function () {

//     //         // Pesquisa de materiais
//     //         Route::get('/pesquisa', [MaterialController::class, 'pesquisa'])->name('pesquisa');

//     //         // Visualização de detalhes de material
//     //         Route::get('/material/{material}', [MaterialController::class, 'show'])->name('material.show');
//     //     });
// });

// Rota padrão - redireciona para login se não autenticado
// Route::get('/', function () {
//     if (Auth::check()) {
//         $user = Auth::user();
//         return match ($user->role) {
//             Role::Admin => redirect()->route('admin.dashboard.admin'),
//             Role::User => redirect()->route('user.dashboard'),
//             default => redirect()->route('login')
//         };
//     }
//     return redirect()->route('login');
// })->name('home');

// Route::middleware(['auth', 'role:ADMIN'])->group(function () {
//     Route::middleware([CheckLogin::class])->group(function () {
//         Route::prefix('admin')->name('admin.')->group(function () {
//             Route::prefix('materiais')->name('materiais.')->group(function () {
//                 Route::get('/', [MaterialController::class, 'index'])->name('index');
//                 Route::get('/create', [MaterialController::class, 'create'])->name('create');
//                 Route::get('/tela_de_livros', [MaterialController::class, 'tela_de_livros'])->name('tela_de_livros');
//                 Route::post('/store', [MaterialController::class, 'store'])->name('store');
//                 Route::get('/{material}/edit', [MaterialController::class, 'edit'])->name('edit');
//                 Route::put('/{material}/update', [MaterialController::class, 'update'])->name('update');
//                 Route::delete('/{material}/destroy', [MaterialController::class, 'destroy'])->name('destroy');
//             });

//             Route::prefix('dashboard')->name('dashboard.')->group(function () {
//                 Route::get('/admin', [Main::class, 'dashboard_admin'])->name('dashboard_admin');
//             });

//             Route::prefix('cursos')->name('cursos.')->group(function () {
//                 Route::get('/', [CursoController::class, 'index'])->name('index');
//                 Route::get('/create', [CursoController::class, 'create'])->name('create');
//                 Route::post('/store', [CursoController::class, 'store'])->name('store');
//                 Route::get('/{curso}/edit', [CursoController::class, 'edit'])->name('edit');
//                 Route::put('/{curso}/update', [CursoController::class, 'update'])->name('update');
//                 Route::get('/{curso}/cursos', [CursoController::class, 'cursos'])->name('cursos');
//                 Route::delete('/{curso}/destroy', [CursoController::class, 'destroy'])->name('destroy');
//             });

//             Route::prefix('usuarios')->name('usuarios.')->group(function () {
//                 Route::get('/', [UsuarioController::class, 'usuarios'])->name('index');
//                 Route::get('/create', [UsuarioController::class, 'create'])->name('create');
//                 Route::post('/store', [UsuarioController::class, 'store'])->name('store');
//                 Route::get('/{id}/edit', [UsuarioController::class, 'edit'])->name('edit');
//                 Route::put('/{id}/update', [UsuarioController::class, 'update'])->name('update');
//                 Route::delete('/{id}/destroy', [UsuarioController::class, 'destroy'])->name('destroy');
//             });

//             Route::prefix('categorias')->name('categorias.')->group(function () {
//                 Route::get('/', [CategoriaController::class, 'index'])->name('index');
//                 Route::get('/create', [CategoriaController::class, 'create'])->name('create');
//                 Route::post('/store', [CategoriaController::class, 'store'])->name('store');
//                 Route::get('/{categoria}/edit', [CategoriaController::class, 'edit'])->name('edit');
//                 Route::put('/{categoria}/update', [CategoriaController::class, 'update'])->name('update');
//                 Route::delete('/{categoria}/destroy', [CategoriaController::class, 'destroy'])->name('destroy');
//             });

//             Route::prefix('emprestimos')->name('emprestimos.')->group(function () {
//                 Route::get('/', [EmprestimoController::class, 'index'])->name('index');
//                 Route::get('/create', [EmprestimoController::class, 'create'])->name('create');
//                 Route::post('/store', [EmprestimoController::class, 'store'])->name('store');
//                 Route::get('/{emprestimo}/edit', [EmprestimoController::class, 'edit'])->name('edit');
//                 Route::put('/{emprestimo}/update', [EmprestimoController::class, 'update'])->name('update');
//                 Route::delete('/{emprestimo}/destroy', [EmprestimoController::class, 'destroy'])->name('destroy');
//             });

//             Route::prefix('subcategorias')->name('subcategorias.')->group(function () {
//                 Route::get('/', [SubcategoriaController::class, 'index'])->name('index');
//                 Route::get('/create', [SubcategoriaController::class, 'create'])->name('create');
//                 Route::post('/store', [SubcategoriaController::class, 'store'])->name('store');
//                 Route::get('/{subcategoria}/edit', [SubcategoriaController::class, 'edit'])->name('edit');
//                 Route::put('/{subcategoria}/update', [SubcategoriaController::class, 'update'])->name('update');
//                 Route::delete('/{subcategoria}/destroy', [SubcategoriaController::class, 'destroy'])->name('destroy');
//             });
//         });

//         Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//     });
// });

// Route::middleware(['auth', 'role:USER'])->group(function () {
//     Route::middleware([CheckLogin::class])->group(function () {
//         Route::get('/tela_de_livros', [MaterialController::class, 'tela_de_livros'])->name('tela_de_livros');
//     });
// });
