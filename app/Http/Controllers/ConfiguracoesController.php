<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ConfiguracoesController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.configuracoes.index', compact('users'));
    }

    public function promover(User $user)
    {
        $user->role = 'ADMIN';
        $user->save();
        return back()->with('success', 'Usuário promovido a ADMIN com sucesso!');
    }

    public function despromover(User $user)
    {
        $user->role = 'USER';
        $user->save();
        return back()->with('success', 'Usuário despromovido para USER com sucesso!');
    }
}
