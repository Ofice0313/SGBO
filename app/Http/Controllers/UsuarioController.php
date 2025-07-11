<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function user_index()
    {
        $usuarios = UserModel::with('curso')->get();
        return view('user_index', compact('usuarios'));
    }

    public function create_user()
    {
        $cursos = Curso::all();
        return view('create_user', compact('cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|min:6',
            'curso_id' => 'nullable|exists:cursos,id',
        ]);

        UserModel::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'status' => $request->status,
            'instituicao' => $request->instituicao,
            'password' => Hash::make($request->password),
            'curso_id' => $request->curso_id,
        ]);

        return redirect()->route('user_index')->with('success', 'Usuário criado!');
    }

    public function edit_user($id)
    {
        $usuario = UserModel::findOrFail($id);
        $cursos = Curso::all();
        return view('edit_user', compact('usuario', 'cursos'));
    }

    public function update(Request $request, $id)
    {
        $usuario = UserModel::findOrFail($id);

        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'curso_id' => 'nullable|exists:cursos,id',
        ]);

        $usuario->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'status' => $request->status,
            'instituicao' => $request->instituicao,
            'curso_id' => $request->curso_id,
        ]);

        return redirect()->route('user_index')->with('success', 'Usuário atualizado!');
    }

    public function destroy($id)
    {
        UserModel::destroy($id);
        return redirect()->route('user_index')->with('success', 'Usuário removido!');
    }
}
