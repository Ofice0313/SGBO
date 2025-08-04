<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // public function login()
    // {
    //     $data = [
    //         'title' => 'login'
    //     ];
    //     return view('login', $data);
    // }

    // public function login_submit(Request $request)
    // {
    //     //Form validation
    //     $request->validate([
    //         'email' => 'required|min:6',
    //         'instituicao' => 'required|in:LORE,ISLORE,FOCO',
    //         'password' => 'required|min:5',
    //     ], [
    //         'email.required' => 'O campo eh de preenchimento obrigatorio.',
    //         'email.min' => 'O campo deve ter no minimo 6 caracteres',
    //         'instituicao.required' => 'Selecione uma instituicao',
    //         'instituicao.in' => 'Instituicao Invalida',
    //         'password.required' => 'O campo eh de preenchimento obrigatorio.',
    //         'password.min' => 'O campo deve ter no minimo 3 caracteres.',
    //     ]);

    //     $email = $request->input('email');
    //     $password = $request->input('password');
    //     $instituicao = $request->input('instituicao');

    //     $user = User::where('email', $email)
    //         ->where('instituicao', $instituicao)
    //         ->whereNull('deleted_at')
    //         ->first();

    //     if ($user && password_verify($password, $user->password)) {
    //         Auth::login($user); // ESSENCIAL

    //         // Redireciona baseado na role
    //         return $user->isAdmin()
    //             ? redirect()->route('admin.dashboard.dashboard')
    //             : redirect()->route('tela_de_livros');
    //     }

    //     // invalid login
    //     return redirect()->route('login')->withInput()->with('login_error', 'Login invalido');
    // }

    // public function logout(){
    //     session()->forget('email');
    //     return redirect()->route('login')->with('logout_success', 'Deslogado com sucesso');
    // }


    // public function login()
    // {
    //     if (Auth::check()) {
    //         return $this->redirectBasedOnRole(Auth::user());
    //     }

    //     return view('login', ['title' => 'Login']);
    // }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|min:6',
            'instituicao' => 'required|in:LORE,ISLORE,FOCO',
            'password' => 'required|min:5',
        ], [
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Digite um email válido.',
            'email.min' => 'O email deve ter no mínimo 6 caracteres.',
            'instituicao.required' => 'Selecione uma instituição.',
            'instituicao.in' => 'Instituição inválida.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter no mínimo 5 caracteres.',
        ]);

        $credentials = $request->only('email', 'password', 'instituicao');

        $user = User::where('email', $credentials['email'])
            ->where('instituicao', $credentials['instituicao'])
            ->whereNull('deleted_at')
            ->first();

        if ($user && password_verify($credentials['password'], $user->password)) {
            Auth::login($user, $request->boolean('remember'));

            return $this->redirectBasedOnRole($user)
                ->with('success', 'Login realizado com sucesso!');
        }

        return back()
            ->withInput($request->except('password'))
            ->with('login_error', 'Credenciais inválidas. Verifique seus dados.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('logout_success', 'Deslogado com sucesso!');
    }

    private function redirectBasedOnRole(User $user)
    {
        return match ($user->role) {
            Role::Admin => redirect()->route('admin.dashboard.admin'),
            Role::User => redirect()->route('user.tela_de_livros'),
            default => redirect()->route('login')->with('error', 'Role não reconhecida.')
        };
    }
}
