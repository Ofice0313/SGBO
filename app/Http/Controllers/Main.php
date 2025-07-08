<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function register()
    {
        $data = [
            'title' => 'Novo Registro',
        ];
        return view('register', $data);
    }

    public function new_register_submit(Request $request)
    {
        // Validação
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|string',
            'subcategoria' => 'nullable|string',
            'categoria' => 'nullable|string',
            'autor' => 'nullable|string',
            'editora' => 'nullable|string',
            'ano_de_publicacao' => 'nullable|integer',
            'numero_paginas' => 'nullable|integer',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'arquivo' => 'nullable|file|mimes:pdf,doc,docx,epub,mp3,wav'
        ]);

        // Salvar imagem se existir
        $caminhoImagem = null;
        if ($request->hasFile('imagem')) {
            $caminhoImagem = $request->file('imagem')->store('imagens', 'public');
        }

        // Salvar arquivo se existir
        $caminhoArquivo = null;
        if ($request->hasFile('arquivo')) {
            $caminhoArquivo = $request->file('arquivo')->store('arquivos', 'public');
        }

        // Criar Material
        Material::create([
            'titulo' => $request->titulo,
            'tipo' => $request->tipo,
            'subcategoria' => $request->subcategoria,
            'categoria' => $request->categoria,
            'autor' => $request->autor,
            'editora' => $request->editora,
            'ano_de_publicacao' => $request->ano_de_publicacao,
            'paginas' => $request->numero_paginas,
            'caminho_da_imagem' => $caminhoImagem,
            'caminho_do_arquivo' => $caminhoArquivo,
        ]);

        return redirect()->route('index')->with('success', 'Material registrado com sucesso!');
    }

    public function index()
    {
        $materiais = Material::all();
        return view('index', [
            'title' => 'Lista de Materiais',
            'materiais' => $materiais,
            'datatables' => true
        ]);
    }

    // Mostra o form de edição
    public function edit($id)
    {
        $material = Material::findOrFail($id);

        return view('edit', [
            'title' => 'Editar Material',
            'material' => $material
        ]);
    }

    // Atualiza o material
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|string',
            'subcategoria' => 'nullable|string',
            'categoria' => 'nullable|string',
            'autor' => 'nullable|string',
            'editora' => 'nullable|string',
            'ano_de_publicacao' => 'nullable|integer',
            'numero_paginas' => 'nullable|integer',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'arquivo' => 'nullable|file|mimes:pdf,doc,docx,epub,mp3,wav'
        ]);

        $material = Material::findOrFail($id);

        $material->titulo = $request->titulo;
        $material->tipo = $request->tipo;
        $material->subcategoria = $request->subcategoria;
        $material->categoria = $request->categoria;
        $material->autor = $request->autor;
        $material->editora = $request->editora;
        $material->ano_de_publicacao = $request->ano_de_publicacao;
        $material->paginas = $request->numero_paginas;

        // Se enviou nova imagem
        if ($request->hasFile('imagem')) {
            $material->caminho_da_imagem = $request->file('imagem')->store('imagens', 'public');
        }

        // Se enviou novo arquivo
        if ($request->hasFile('arquivo')) {
            $material->caminho_do_arquivo = $request->file('arquivo')->store('arquivos', 'public');
        }

        $material->save();

        return redirect()->route('index')->with('success', 'Material atualizado com sucesso!');
    }

    // Deleta material
    public function delete($id)
    {
        $material = Material::findOrFail($id);

        $material->delete();

        return redirect()->route('index')->with('success', 'Material excluído com sucesso!');
    }
}
