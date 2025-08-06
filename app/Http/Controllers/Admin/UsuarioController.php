<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function usuarios(Request $request)
    {
        $query = $request->input('q');
        $usuarios = User::with('curso')
            ->withCount('emprestimos');
        if ($query) {
            $usuarios = $usuarios->where('nome', 'like', "%$query%")
                ->orWhere('email', 'like', "%$query%")
                ->orWhere('telefone', 'like', "%$query%")
                ->orWhere('instituicao', 'like', "%$query%")
                ->orWhere('endereco', 'like', "%$query%");
        }
        $usuarios = $usuarios->get();
        $data = [
            'title' => 'usuarios',
        ];
        return view('admin.usuarios.index', array_merge($data, compact('usuarios')));
    }

    public function index(){
        $usuarios = User::with('curso')->get();
        $emprestimos = User::withCount('emprestimos')->get();
        $data = [
            'title' => 'usuarios',
            'usuarios' => $usuarios,
        ];
        return view('admin.usuarios.index', compact('data', 'usuarios', 'emprestimos'));
    }

    public function edit($id)
    {
        $usuario = User::with('curso')->findOrFail($id);
        $data = [
            'title' => 'editar_usuario',
            'usuario' => $usuario,
        ];
        return view('admin.usuarios.editar_usuario', $data);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $data = $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'telefone' => 'nullable|string',
            'instituicao' => 'nullable|string',
            'endereco' => 'nullable|string',
            'curso' => 'nullable|string',
            'password' => 'nullable|string|confirmed',
        ]);
        if (!empty($data['password'])) {
            $usuario->password = bcrypt($data['password']);
        }
        $usuario->fill($data);
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }

    public function create()
    {
        $cursos = Curso::all();
        $data = [
            'title' => 'registrar-me'
        ];
        return view('admin.usuarios.cadastrar_usuario', compact('data', 'cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:50',
            'endereco' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
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

        $user = new User();
        $user->nome = $request->nome;
        $user->telefone = $request->telefone;
        $user->endereco = $request->endereco;
        $user->email = $request->email;
        $user->instituicao = $request->instituicao;
        $user->curso_id = $request->curso_id;
        $user->password = Hash::make($request->password);
        $user->status = true; // exemplo: define ativo
        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Conta criada com sucesso! Faça login.');
    }
}
