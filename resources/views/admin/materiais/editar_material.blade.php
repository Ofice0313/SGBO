@extends('templates/registro_de_material_layout')
@section('content')
    <div class="container py-5">
        <header class="mb-4">
            <h1 class="h4 fw-bold">Editar material</h1>
        </header>

        <main class="bg-light p-4 rounded shadow">
            <div class="row g-4">
                <!-- Imagem -->
                <div class="col-lg-4">
                    <img src="{{ asset('storage/' . $material->caminho_da_imagem) }}" alt="Capa do material" class="img-cover">
                </div>

                <!-- Formulário -->
                <div class="col-lg-8">
                    <h2 class="h5 fw-semibold text-center mb-4">Editar Material</h2>
                    <form action="{{ route('admin.materiais.update', $material->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" id="titulo" name="titulo" class="form-control"
                                    value="{{ old('titulo', $material->titulo) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="tipo" class="form-label">Tipo de Material</label>
                                <select name="tipo" id="tipo" class="form-select" required>
                                    <option value="">Selecione</option>
                                    @foreach (['LIVRO', 'AUDIOLIVRO', 'REVISTA', 'ARTIGO'] as $tipo)
                                        <option value="{{ $tipo }}" @selected($material->tipo == $tipo)>{{ $tipo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="autor" class="form-label">Autor</label>
                                <input type="text" id="autor" name="autor" class="form-control"
                                    value="{{ old('autor', $material->autor) }}">
                            </div>

                            <div class="col-md-6">
                                <label for="subcategoria_id" class="form-label">Subcategoria</label>
                                <select name="subcategoria_id" id="subcategoria" class="form-select" required>
                                    <option value="">Selecione</option>
                                    @foreach ($subcategorias as $subcategoria)
                                        <option value="{{ $subcategoria->id }}" @selected($material->subcategoria_id == $subcategoria->id)>
                                            {{ $subcategoria->nome }} ({{ $subcategoria->categoria->nome }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="editora" class="form-label">Editora</label>
                                <input type="text" id="editora" class="form-control" name="editora"
                                    value="{{ old('editora', $material->editora) }}">
                            </div>

                            <div class="col-md-6">
                                <label for="categoria_id" class="form-label">Categoria</label>
                                <select name="categoria_id" id="categoria" class="form-select" required>
                                    <option value="">Selecione</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" @selected($material->categoria_id == $categoria->id)>
                                            {{ $categoria->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="ano_de_publicacao" class="form-label">Ano de publicação</label>
                                <input type="number" min="0" id="ano_publicacao" name="ano_de_publicacao"
                                    class="form-control"
                                    value="{{ old('ano_de_publicacao', $material->ano_de_publicacao) }}">
                            </div>

                            <div class="col-md-6">
                                <label for="status_material" class="form-label">Status do livro</label>
                                <select name="status_material" id="status_material" class="form-select">
                                    <option value="DISPONIVEL" @selected($material->status_material == 'DISPONIVEL')>Disponível</option>
                                    <option value="INDISPONIVEL" @selected($material->status_material == 'INDISPONIVEL')>Indisponível</option>
                                </select>
                            </div>

                            <div class="col-12 d-flex flex-column flex-md-row align-items-start gap-3">
                                <div class="col-md-6">
                                    <label for="paginas" class="form-label">Número de Páginas</label>
                                    <input type="number" class="form-control" min="0" name="paginas" id="paginas"
                                        value="{{ old('paginas', $material->paginas) }}">
                                </div>

                                <div class="col-md-6">
                                    <label for="minutos" class="form-label">Duração (em minutos)</label>
                                    <input type="number" name="minutos" id="minutos" class="form-control" min="1"
                                        value="{{ old('minutos', $material->minutos) }}">
                                </div>
                            </div>

                            <div class="col-12 d-flex flex-column flex-md-row align-items-start gap-3">
                                <div class="col-md-6">
                                    <label for="caminho_do_arquivo" class="form-label">Substituir Arquivo</label>
                                    <input class="form-control" type="file" name="caminho_do_arquivo"
                                        id="caminho_do_arquivo" accept=".pdf,.doc,.docx,.epub,.mp3,.wav">
                                </div>

                                <div class="col-md-6">
                                    <label for="caminho_da_imagem" class="form-label">Substituir Capa</label>
                                    <input class="form-control" type="file" name="caminho_da_imagem"
                                        id="caminho_da_imagem" accept="image/*">
                                </div>
                            </div>

                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-dark px-4">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
