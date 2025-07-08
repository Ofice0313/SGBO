@extends('templates/register_layout')

@section('content')

<div class="container mt-5">
    <h4 class="mb-4">Registrar Material</h4>

    <form action="{{ route('new_register_submit') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Digite o título" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Material</label>
            <select name="tipo" id="tipo" class="form-select" required>
                <option value="">Selecione</option>
                <option value="LIVRO">Livro</option>
                <option value="AUDIOLIVRO">Áudio Livro</option>
                <option value="REVISTA">Revista</option>
                <option value="ARTIGO">Artigo</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="subcategoria" class="form-label">Subcategoria</label>
            <input type="text" class="form-control" name="subcategoria" id="subcategoria" placeholder="Ex: Poesia Hip Hop">
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Ex: Literatura">
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" name="autor" id="autor" placeholder="Nome do autor">
        </div>

        <div class="mb-3">
            <label for="editora" class="form-label">Editora</label>
            <input type="text" class="form-control" name="editora" id="editora" placeholder="Nome da editora">
        </div>

        <div class="mb-3">
            <label for="ano_de_publicacao" class="form-label">Ano de Publicação</label>
            <input type="number" class="form-control" name="ano_de_publicacao" id="ano_de_publicacao" placeholder="Ex: 2025">
        </div>

        <div class="mb-3">
            <label for="numero_paginas" class="form-label">Número de Páginas</label>
            <input type="number" class="form-control" name="numero_paginas" id="numero_paginas" placeholder="Total de páginas">
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem da Capa</label>
            <input class="form-control" type="file" name="imagem" id="imagem" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo do Material</label>
            <input class="form-control" type="file" name="arquivo" id="arquivo" accept=".pdf,.doc,.docx,.epub,.mp3,.wav">
        </div>

        <button type="submit" class="btn btn-success">
            <a href="{{ route('index') }} ">
            <i class="bi bi-save me-1"></i></a> Registrar Material
        </button>
    </form>
</div>

@endsection
