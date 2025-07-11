<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function curso_index()
    {
        $cursos = Curso::all();
        return view('curso_index', compact('cursos'));
    }

    public function curso_create()
    {
        return view('curso_create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string']);
        Curso::create(['nome' => $request->nome]);
        return redirect()->route('curso_index')->with('success', 'Curso criado!');
    }

    public function curso_edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view('curso_edit', compact('curso'));
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $request->validate(['nome' => 'required|string']);
        $curso->update(['nome' => $request->nome]);
        return redirect()->route('curso_index')->with('success', 'Curso atualizado!');
    }

    public function destroy_curso($id)
    {
        Curso::destroy($id);
        return redirect()->route('curso_index')->with('success', 'Curso removido!');
    }
}
