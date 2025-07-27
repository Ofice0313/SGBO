@extends('templates/livros_layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>{{ $material->titulo }}</h1>
                <a href="{{ route('materiais.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    @if($material->hasPdf())
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5><i class="fas fa-file-pdf"></i> Visualização do Livro</h5>
                            </div>
                            <div class="card-body p-0">
                                <iframe src="{{ $material->getPdfUrl() }}" 
                                        width="100%" 
                                        height="600px" 
                                        frameborder="0"
                                        id="pdfViewer"
                                        oncontextmenu="return false;"
                                        style="pointer-events: auto;">
                                </iframe>
                            </div>
                        </div>
                    @endif
                    
                    @if($material->hasAudio())
                        <div class="card">
                            <div class="card-header">
                                <h5><i class="fas fa-headphones"></i> Audiolivro</h5>
                            </div>
                            <div class="card-body">
                                <audio controls 
                                       controlsList="nodownload" 
                                       oncontextmenu="return false;"
                                       style="width: 100%;">
                                    <source src="{{ $book->getAudioUrl() }}" type="audio/mpeg">
                                    Seu navegador não suporta o elemento de áudio.
                                </audio>
                            </div>
                        </div>
                    @endif
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            @if($material->caminho_da_imagem)
                                <img src="{{ asset('storage/covers/' . $material->caminho_da_imagem) }}" 
                                     class="img-fluid mb-3" alt="{{ $material->titulo }}">
                            @endif
                            
                            <h5>{{ $material->titulo }}</h5>
                            <p><strong>Autor:</strong> {{ $material->autor }}</p>

                            
                            <div class="mt-3">
                                @if($material->hasPdf())
                                    <span class="badge bg-success me-2">PDF Disponível</span>
                                @endif
                                @if($material->hasAudio())
                                    <span class="badge bg-info">Áudio Disponível</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Protege contra seleção e cópia */
    #pdfViewer {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    
    /* Desabilita o menu de contexto */
    iframe, audio {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
</style>

<script>
    // Proteção adicional contra tentativas de download
    document.addEventListener('DOMContentLoaded', function() {
        // Desabilita teclas de atalho comuns
        document.addEventListener('keydown', function(e) {
            // Ctrl+S (Salvar)
            if (e.ctrlKey && e.key === 's') {
                e.preventDefault();
                alert('Download não permitido');
                return false;
            }
            // Ctrl+A (Selecionar tudo)
            if (e.ctrlKey && e.key === 'a') {
                e.preventDefault();
                return false;
            }
            // Ctrl+P (Imprimir)
            if (e.ctrlKey && e.key === 'p') {
                e.preventDefault();
                alert('Impressão não permitida');
                return false;
            }
            // F12 (DevTools)
            if (e.key === 'F12') {
                e.preventDefault();
                return false;
            }
        });
        
        // Desabilita o menu de contexto (botão direito)
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            return false;
        });
        
        // Desabilita seleção de texto
        document.addEventListener('selectstart', function(e) {
            e.preventDefault();
            return false;
        });
    });
</script>
@endsection