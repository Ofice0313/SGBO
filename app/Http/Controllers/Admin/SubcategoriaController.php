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
        $categoria = Categoria::with('categoria')->findOrFail($id);
        $data = [
            'title' => 'editar_categoria',
            'usuario' => $categoria,
        ];
        return redirect()->route('subcategorias.index')->with('success', 'Subcategoria actualizada com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $subcategoria = Categoria::findOrFail($id);
        $data = $request->validate([
            'nome' => 'required|string',
            'categoria' => 'nullable|string',
        ]);
        $subcategoria->fill($data);
        $subcategoria->save();
        return redirect()->route('subcategorias.index')->with('success', 'Subcategoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $subcategoria = Categoria::findOrFail($id);
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

        $subcategorias = new Categoria();
        $subcategorias->nome = $request->nome;
        $subcategorias->categoria_id = $request->categoria_id;
        $subcategorias->save();

        return redirect()->route('subcategorias.index')->with('success', 'Subcategoria criada com sucesso!.');
    }
}
