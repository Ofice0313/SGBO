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
                <h3 class="mb-5 text-uppercase text-center">Registrar Material</h3>

                <form action="{{ route('new_register_submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="titulo">Título</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="título"/>
                    </div>
                  </div>

                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                       <label for="tipo" class="form-label">Tipo de Material</label>
                       <select name="tipo" id="tipo" class="form-select" required>
                            <option value="">Selecione</option>
                            <option value="LIVRO">Livro</option>
                            <option value="AUDIOLIVRO">Áudio Livro</option>
                            <option value="REVISTA">Revista</option>
                            <option value="ARTIGO">Artigo</option>
                       </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                        <label for="subcategoria" class="form-label">Subcategoria</label>
                        <select name="subcategoria" id="subcategoria" class="form-select" required>
                            <option value="">Selecione</option>
                            <option value="PROGRAMACAO">PROGRAMAÇÃO</option>
                            <option value="REDES">Redes</option>
                            <option value="BANCO DE DADOS">Banco de Dados</option>
                            <option value="DESIGN">Design</option>
                            <option value="INTELIGENCIA ARTIFICIAL">Inteligência Artificial</option>
                            <option value="MEDICINAGERAL">Medicina Geral</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                     <label for="categoria" class="form-label">Categoria</label>
                     <select name="categoria" id="categoria" class="form-select" required>
                          <option value="TECNOLOGIA">Tecnologia</option>
                          <option value="SAUDE">Saude</option>
                     </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" name="autor" id="autor" placeholder="Nome do autor">
                    </div>
                  </div>

                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                        <label for="editora" class="form-label">Editora</label>
                        <input type="text" class="form-control" name="editora" id="editora" placeholder="Nome da editora">
                    </div>
                  </div>
                </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label for="ano_de_publicacao" class="form-label">Ano de Publicação</label>
                                <input type="number" class="form-control" name="ano_de_publicacao" id="ano_de_publicacao" placeholder="Ex: 2025">
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label for="numero_paginas" class="form-label">Número de Páginas</label>
                                <input type="number" class="form-control" name="numero_paginas" id="numero_paginas" placeholder="Total de páginas">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label for="imagem" class="form-label">Imagem da Capa</label>
                                <input class="form-control" type="file" name="imagem" id="imagem" accept="image/*">
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label for="arquivo" class="form-label">Arquivo do Material</label>
                                <input class="form-control" type="file" name="arquivo" id="arquivo" accept=".pdf,.doc,.docx,.epub,.mp3,.wav">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                      <i class="bi bi-save me-1"></i>Registrar Material
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