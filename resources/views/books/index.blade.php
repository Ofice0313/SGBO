@extends('templates/livros_layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Biblioteca Digital</h1>
            
            <div class="row">
                @foreach($materiais as $material)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if($material->caminho_da_imagem)
                            <img src="{{ asset('storage/covers/' . $material->caminho_da_imagem) }}" 
                                 class="card-img-top" alt="{{ $material->titulo }}" style="height: 250px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $material->titulo }}</h5>
                            <p class="card-text">{{ $material->autor }}</p>
                            
                            <div class="d-flex justify-content-between">
                                @if($material->hasPdf())
                                    <span class="badge bg-success">PDF</span>
                                @endif
                                @if($material->hasAudio())
                                    <span class="badge bg-info">Áudio</span>
                                @endif
                            </div>
                            
                            <a href="{{ route('materiais.visualizar', $material) }}" class="btn btn-primary mt-2">
                                Ver Detalhes
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            {{ $books->links() }}
        </div>
    </div>
</div>
@endsection