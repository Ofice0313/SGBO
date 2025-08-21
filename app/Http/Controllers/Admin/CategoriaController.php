<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        $data = [
            'title' => 'Cadastrar Categoria',
        ];
        return view('admin.categorias.cadastrar_categoria', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        Categoria::create([
            'nome' => $request->nome
        ]);

        return back()->with('success', 'Categoria cadastrada com sucesso!');
    }

    public function edit(Categoria $categoria)
    {
        $data = [
            'title' => 'Editar Curso',
            'categoria' => $categoria,
        ];
        return back()->with('success', 'Categoria editada com sucesso!');
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        $categoria->update([
            'nome' => $request->nome
        ]);

        return back()->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return back()->with('success', 'Categoria eliminada com sucesso!');
    }
}
