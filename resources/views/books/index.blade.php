@extends('templates/livros_layout')
@section('content')
    <div class="row g-4 justify-content-center">
    @foreach ($materiais as $material)
        <div class="col-6 col-sm-4 col-md-3 d-flex">
            <div class="card mx-auto" style="width: 18rem;">
                {{-- Exibe imagem da pasta storage --}}
                <img src="{{ asset('storage/covers/' . $material->caminho_da_imagem) }}" 
                     class="card-img-top" 
                     alt="{{ $material->titulo }}"
                     style="height: 250px; object-fit: cover;">

                <div class="card-body text-center">
                    <h5 class="card-title">{{ $material->titulo }}</h5>
                    <h6>{{ $material->autor }}</h6>
                    <h6>Status: {{ $material->status_material }}</h6>
                    
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-success btn-sm">Emprestar</a>
                                                <!-- Botão para abrir o modal de detalhes -->
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detalhesModal{{ $material->id }}">
                                                        <i class="bi bi-eye-fill"></i> Ver detalhes
                                                </button>

                                                <!-- Modal de Detalhes do Livro -->
                                                <div class="modal fade" id="detalhesModal{{ $material->id }}" tabindex="-1" aria-labelledby="detalhesModalLabel{{ $material->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="detalhesModalLabel{{ $material->id }}">Detalhes do Livro</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{ asset('storage/covers/' . $material->caminho_da_imagem) }}" alt="Capa do Livro" class="img-fluid mb-3" style="max-height: 200px;">
                                                                <h5>{{ $material->titulo }}</h5>
                                                                <p><strong>Autor:</strong> {{ $material->autor }}</p>
                                                                <p><strong>Status:</strong> {{ $material->status_material }}</p>
                                                                <p><strong>Editora:</strong> {{ $material->editora }}</p>
                                                                <p><strong>Ano de Publicação:</strong> {{ $material->ano_de_publicacao }}</p>
                                                                <p><strong>Páginas:</strong> {{ $material->paginas }}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                        <a href="{{ route('books.visualizarLivro', $material->id) }}" class="btn btn-warning btn-sm" target="_blank">
                            <i class="bi bi-book-fill"></i> Visualizar conteúdo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
