<?php

namespace App\Http\Controllers\Admin;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CursoController extends Controller
{
    public function cursos(Request $request)
    {
        $query = $request->input('q');
        $cursos = Curso::query();
        if ($query) {
            $cursos = $cursos->where('nome', 'like', "%$query%");
        }
        $cursos = $cursos->get();
        $data = [
            'title' => 'cursos',
        ];
        return view('admin.cursos.index', array_merge($data, compact('cursos')));
    }

    public function index()
    {
        $cursos = Curso::all();
        return view('admin.cursos.index', compact('cursos'));
    }

    public function create()
    {
        $data = [
            'title' => 'Cadastrar Curso',
        ];
        return view('admin.cursos.cadastrar_curso', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        Curso::create([
            'nome' => $request->nome
        ]);

        return back()->with('success', 'Curso criado com sucesso!');
    }

    public function edit(Curso $curso)
    {
        $data = [
            'title' => 'Editar Curso',
            'curso' => $curso,
        ];
        return view('admin.cursos.editar_curso', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        $curso->update([
            'nome' => $request->nome
        ]);

        return back()->with('success', 'Curso atualizado com sucesso!');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
        return back()->with('success', 'Curso eliminado com sucesso!');
    }
}
