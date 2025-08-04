<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $data['meta_title'] = 'Login';
        return view('auth.login', $data);
    }

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

        if(Auth::attempt(['email' => $request->email, 'instituicao' => $request->instituicao, 'password' => $request->password], true))
        {
            if(Auth::User()->role == "USER")
            {
                echo "Is User";die();
            }else if(Auth::User()->role == "ADMIN")
            {
                echo "Is Admin";die();
            }else{
                return redirect()->route('login')->with('error', 'Credencias invalidas.');
            }
        }else{
            return redirect()->back()->with('error', 'Digite os dados certos.');
        }
    }

    public function create()
    {
        $cursos = Curso::all(); 
        $data = [
            'title' => 'registrar-me'
        ];
        return view('auth.cadastrar_usuario', compact('data', 'cursos'));
    }

    public function cadastrar_usuario(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:50',
            'endereco' => 'nullable|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'instituicao' => 'required|in:LORE,ISLORE,FOCO',
            'curso_id' => 'required|exists:cursos,id',
            'password' => 'required|confirmed|min:6',
        ], [
            'password.confirmed' => 'As passwords não coincidem.',
            'instituicao.required' => 'Selecione uma instituição.',
            'instituicao.in' => 'Instituição inválida.',
            'curso_id.required' => 'Selecione um curso.',
            'curso_id.exists' => 'O curso selecionado não existe.',
        ]);

        $user = new  User();
        $user->nome = $request->nome;
        $user->telefone = $request->telefone;
        $user->endereco = $request->endereco;
        $user->email = $request->email;
        $user->instituicao = $request->instituicao;
        $user->curso_id = $request->curso_id;
        $user->password = Hash::make($request->password);
        $user->status = true; // exemplo: define ativo
        $user->save();

        return redirect()->route('login')->with('success', 'Conta criada com sucesso! Faça login.');
    }
      
}
