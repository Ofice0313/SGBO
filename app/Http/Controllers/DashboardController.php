<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Material;
use App\Models\User;
use App\Models\Emprestimo;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::User()->role == "USER") {
            $data['meta_title'] = 'Dashboard do Usuário';
            return view('user.dashboard_do_usuario', compact('data'));
        } else if(Auth::User()->role == "ADMIN") {
            $data['meta_title'] = 'Dashboard do Administrador';
            $totalLivros = Material::count();
            $totalUsuarios = User::count();
            $emprestimosAtivos = Emprestimo::where('status_emprestimo', 'ATIVO')->count();
            $livrosPopulares = Material::withCount('emprestimos')->orderByDesc('emprestimos_count')->take(5)->get();
            $notificacoesPendentes = Emprestimo::with(['user', 'material'])
                ->where('status_emprestimo', 'PENDENTE')
                ->orderBy('data_de_devolucao')
                ->get();
            return view('admin.dashboard.dashboard_admin.dashboard_visao_geral', compact(
                'data', 'totalLivros', 'totalUsuarios', 'emprestimosAtivos', 'livrosPopulares', 'notificacoesPendentes'
            ));
        }
    }
}
