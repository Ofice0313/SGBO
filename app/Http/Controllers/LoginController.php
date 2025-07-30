<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        $data = [
            'title' => 'login'
        ];
        return view('login', $data);
    }

    public function login_submit(Request $request)
    {
        //Form validation
        $request->validate([
            'email' => 'required|min:6',
            'instituicao' => 'required|in:LORE,ISLORE,FOCO',
            'password' => 'required|min:5',
        ], [
            'email.required' => 'O campo eh de preenchimento obrigatorio.',
            'email.min' => 'O campo deve ter no minimo 6 caracteres',
            'instituicao.required' => 'Selecione uma instituicao',
            'instituicao.in' => 'Instituicao Invalida',
            'password.required' => 'O campo eh de preenchimento obrigatorio.',
            'password.min' => 'O campo deve ter no minimo 3 caracteres.',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $instituicao = $request->input('instituicao');

        $user = User::where('email', $email)
            ->where('instituicao', $instituicao)
            ->whereNull('deleted_at')
            ->first();

        if ($user && password_verify($password, $user->password)) {
            Auth::login($user); // ESSENCIAL

            // Redireciona baseado na role
            return $user->isAdmin()
                ? redirect()->route('admin.dashboard.dashboard')
                : redirect()->route('tela_de_livros');
        }

        // invalid login
        return redirect()->route('login')->withInput()->with('login_error', 'Login invalido');
    }
}
