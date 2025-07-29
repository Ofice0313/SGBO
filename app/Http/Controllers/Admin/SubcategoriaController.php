<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    public function index()
    {
        $subcategorias = Subcategoria::with('categoria')->get();
        return view('admin.subcategorias.index', compact('subcategorias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.subcategorias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Subcategoria::create($request->all());
        return redirect()->route('admin.subcategorias.index')->with('success', 'Subcategoria criada com sucesso.');
    }

    public function edit(Subcategoria $subcategoria)
    {
        $categorias = Categoria::all();
        return view('admin.subcategorias.edit', compact('subcategoria', 'categorias'));
    }

    public function update(Request $request, Subcategoria $subcategoria)
    {
        $request->validate([
            'nome' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $subcategoria->update($request->all());
        return redirect()->route('admin.subcategorias.index')->with('success', 'Subcategoria actualizada com sucesso.');
    }

    public function destroy(Subcategoria $subcategoria)
    {
        $subcategoria->delete();
        return redirect()->route('admin.subcategorias.index')->with('success', 'Subcategoria eliminada com sucesso.');
    }
}

