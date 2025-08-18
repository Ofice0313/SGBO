<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    public function subcategorias(Request $request)
    {
        $query = $request->input('q');
        $subcategorias = Subcategoria::with('subcategoria');
        if ($query) {
            $subcategorias = $subcategorias->where('nome', 'like', "%$query%");
        }
        $subcategorias = $subcategorias->get();
        $data = [
            'title' => 'subcategorias',
        ];
        return view('admin.subcategorias.index', array_merge($data, compact('subcategorias')));
    }

    public function index()
    {
        $subcategorias = Subcategoria::with('categoria')->get();
        $categorias = Categoria::all(); // Se precisar para o select do modal

        return view('admin.subcategorias.index', compact('subcategorias', 'categorias'));
    }

    public function edit($id)
    {
    $subcategoria = Subcategoria::with('categoria')->findOrFail($id);
    // ... lógica de edição se necessário ...
    return back()->with('success', 'Subcategoria carregada para edição!');
    }

    public function update(Request $request, $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        $data = $request->validate([
            'nome' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        $subcategoria->fill($data);
        $subcategoria->save();
        return back()->with('success', 'Subcategoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
    $subcategoria = Subcategoria::findOrFail($id);
    $subcategoria->delete();
    return redirect()->route('subcategorias.index')->with('success', 'Sucategoria excluído com sucesso!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ], [
            'categoria_id.required' => 'Selecione uma categoria.',
            'categoria_id.exists' => 'A categoria selecionada não existe.',
        ]);

        $subcategoria = new Subcategoria();
        $subcategoria->nome = $request->nome;
        $subcategoria->categoria_id = $request->categoria_id;
        $subcategoria->save();

        return back()->with('success', 'Subcategoria criada com sucesso!');
    }
}
