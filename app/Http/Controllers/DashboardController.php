<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::User()->role == "USER")
        {
            $data['meta_title'] = 'Dashboard do Usuário';
            return view('user.dashboard_do_usuario', compact('data'));
        }else if(Auth::User()->role == "ADMIN")
        {
            $data['meta_title'] = 'Dashboard do Administrador';
            return view('admin.dashboard.dashboard_admin.dashboard_visao_geral', compact('data'));
        }
    }
}
