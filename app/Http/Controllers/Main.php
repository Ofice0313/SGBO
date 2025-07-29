<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Material;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Main extends Controller
{

    public function dashboard_admin(){
        $data = ['title' => 'Dashboard Admin'];
        return view('admin.dashboard.dashboard_admin.dashboard_visao_geral', $data);
    }
}
