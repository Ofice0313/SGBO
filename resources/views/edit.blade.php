@extends('templates/register_layout')

@section('content')

<div class="container mt-5">
    <h4 class="mb-4">Editar Material</h4>

    <form action="{{ route('update', $material->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" value="{{ $material->titulo }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select name="tipo" class="form-select" required>
                <option value="">Selecione</option>
                <option value="LIVRO" {{ $material->tipo == 'livro' ? 'selected' : '' }}>Livro</option>
                <option value="AUDIOLIVRO" {{ $material->tipo == 'audio_livro' ? 'selected' : '' }}>Áudio Livro</option>
                <option value="REVISTA" {{ $material->tipo == 'revista' ? 'selected' : '' }}>Revista</option>
                <option value="ARTIGO" {{ $material->tipo == 'artigo' ? 'selected' : '' }}>Artigo</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Subcategoria</label>
            <input type="text" class="form-control" name="subcategoria" value="{{ $material->subcategoria }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <input type="text" class="form-control" name="categoria" value="{{ $material->categoria }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Autor</label>
            <input type="text" class="form-control" name="autor" value="{{ $material->autor }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Editora</label>
            <input type="text" class="form-control" name="editora" value="{{ $material->editora }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Ano de Publicação</label>
            <input type="number" class="form-control" name="ano_de_publicacao" value="{{ $material->ano_de_publicacao }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Número de Páginas</label>
            <input type="number" class="form-control" name="numero_paginas" value="{{ $material->paginas }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Imagem</label>
            @if($material->caminho_da_imagem)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $material->caminho_da_imagem) }}" alt="" width="100">
                </div>
            @endif
            <input type="file" name="imagem" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Arquivo</label>
            @if($material->caminho_do_arquivo)
                <div class="mb-2">
                    <a href="{{ asset('storage/' . $material->caminho_do_arquivo) }}" target="_blank">Ver arquivo atual</a>
                </div>
            @endif
            <input type="file" name="arquivo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Atualizar
        </button>
    </form>
</div>

@endsection
