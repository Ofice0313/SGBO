@extends('templates/livros_layout')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <img src="{{ asset('storage/covers/' . $material->caminho_da_imagem) }}" alt="Capa do Livro" style="height: 60px; width: 40px; object-fit: cover; margin-right: 16px;">
                    <div>
                        <h5 class="mb-0">{{ $material->titulo }}</h5>
                        <small>{{ $material->autor }}</small>
                    </div>
                </div>
                <div class="card-body p-0" style="height: 80vh;">
                    <iframe src="{{ asset('storage/books/' . $material->caminho_do_arquivo) }}" width="100%" height="100%" style="border:none;" allowfullscreen sandbox="allow-scripts allow-same-origin"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// Impede o clique direito e seleção de texto
window.onload = function() {
    document.body.oncontextmenu = function() { return false; };
    document.body.onselectstart = function() { return false; };
    document.body.onmousedown = function() { return false; };
};
</script>
@endsection
