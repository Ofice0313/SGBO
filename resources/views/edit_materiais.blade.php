@extends('templates/register_layout')

@section('content')
<section class="bg-dark py-3">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase text-center">Editar Material</h3>

                <form action="{{ route('update', $material->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="titulo">Título</label>
                                <input type="text" id="titulo" name="titulo" value="{{ $material->titulo }}" class="form-control" placeholder="título"/>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                                <div data-mdb-input-init class="form-outline">
                                <label for="tipo" class="form-label">Tipo de Material</label>
                                <select name="tipo" id="tipo" class="form-select" required>
                                        <option value="">Selecione</option>
                                        <option value="LIVRO" {{ $material->tipo == 'livro' ? 'selected' : '' }}>Livro</option>
                                        <option value="AUDIOLIVRO" {{ $material->tipo == 'audio_livro' ? 'selected' : '' }}>Áudio Livro</option>
                                        <option value="REVISTA" {{ $material->tipo == 'revista' ? 'selected' : '' }}>Revista</option>
                                        <option value="ARTIGO" {{ $material->tipo == 'artigo' ? 'selected' : '' }}>Artigo</option>
                                </select>
                                </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label">Subcategoria</label>
                                <select name="subcategoria" id="subcategoria" class="form-select" required>
                                    <option value="">Selecione</option>
                                    <option value="PROGRAMACAO" {{ $material->subcategoria == 'programacao' ? 'selected' : '' }}>PROGRAMAÇÃO</option>
                                    <option value="REDES" {{ $material->subcategoria == 'redes' ? 'selected' : '' }}>Redes</option>
                                    <option value="BANCO DE DADOS" {{ $material->subcategoria == 'banco_de_dados' ? 'selected' : '' }}>Banco de Dados</option>
                                    <option value="DESIGN" {{ $material->subcategoria == 'design' ? 'selected' : '' }}>Design</option>
                                    <option value="INTELIGENCIA ARTIFICIAL" {{ $material->subcategoria == 'inteligencia_artificial' ? 'selected' : '' }}>Inteligência Artificial</option>
                                    <option value="MEDICINAGERAL" {{ $material->subcategoria == 'medicinageral' ? 'selected' : '' }}>Medicina Geral</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label">Categoria</label>
                                <select name="subcategoria" id="subcategoria" class="form-select" required>
                                    <option value="">Selecione</option>
                                    <option value="TECNOLOGIA" {{ $material->categoria == 'tecnologia' ? 'selected' : '' }}>TECNOLOGIA</option>
                                    <option value="SAUDE" {{ $material->categoria == 'saude' ? 'selected' : '' }}>SAUDE</option>       
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label">Autor</label>
                                <input type="text" class="form-control" name="autor" value="{{ $material->autor }}">
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label">Editora</label>
                                <input type="text" class="form-control" name="editora" value="{{ $material->editora }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label">Ano de Publicação</label>
                                <input type="number" class="form-control" name="ano_de_publicacao" value="{{ $material->ano_de_publicacao }}">
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label">Número de Páginas</label>
                                <input type="number" class="form-control" name="numero_paginas" value="{{ $material->paginas }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label for="imagem" class="form-label">Imagem da Capa</label>
                                @if($material->caminho_da_imagem)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $material->caminho_da_imagem) }}" alt="" width="100">
                                    </div>
                                @endif
                                <input type="file" name="imagem" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label for="arquivo" class="form-label">Arquivo do Material</label>
                                @if($material->caminho_do_arquivo)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $material->caminho_do_arquivo) }}" target="_blank">Ver arquivo atual</a>
                                    </div>
                                @endif
                                <input type="file" name="arquivo" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-save me-1"></i> Atualizar
                    </button>
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection


