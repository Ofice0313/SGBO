@extends('templates/registro_de_material_layout')
@section('content')
    <div class="container py-5">
        <header class="mb-4">
            <h1 class="h4 fw-bold">Registro de material</h1>
        </header>

        <main class="bg-light p-4 rounded shadow">
            <div class="row g-4">
                <!-- Imagem -->
                <div class="col-lg-4">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBNTv6ztljE-7E_dBkhoAriomjUKwS_5NbzJ2XyMEvrViVnNZdKdqJXWJNaaZpO-IkVtVNzflwqHMIZVafFovGxdy5XjB6ru2qbjYCg3cIFIJwtgDsV_ovSnAgPGn_Xk3gB_7VV9EqoHQiIJE2h2Tt_xd4fYzgdiUIZI0G5eH97ZTIewBJ8XlC35LEvEVEDtPn5uV8hzqmk8sF_8dWQBC4RKBuaZmMonS0cLMdO2pvhWOn_HP99CdHhmmWB2C7HJr1qPrj1R9baW-4"
                        alt="Uma mão alcançando um livro chamado 'NUTUK' em uma estante." class="img-cover">
                </div>

                <!-- Formulário -->
                <div class="col-lg-8">
                    <h2 class="h5 fw-semibold text-center mb-4">Registrar Material</h2>
                    <form action="{{ route('materiais.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" id="titulo" name="titulo" class="form-control"
                                    placeholder="Título do material" required>
                            </div>
                            <div class="col-md-6">
                                <label for="tipo" class="form-label">Tipo de Material</label>
                                <select name="tipo" id="tipo" class="form-select" required>
                                    <option value="">Selecione</option>
                                    <option value="LIVRO">Livro</option>
                                    <option value="AUDIOLIVRO">Áudio Livro</option>
                                    <option value="REVISTA">Revista</option>
                                    <option value="ARTIGO">Artigo</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="autor" class="form-label">Autor</label>
                                <input type="text" id="autor" name="autor" class="form-control"
                                    placeholder="Ex: Mustafa Kemal Atatürk">
                            </div>
                            <div class="col-md-6">
                                <label for="subcategoria_id" class="form-label">Subcategoria</label>
                                <select name="subcategoria_id" id="subcategoria" class="form-select" required>
                                    <option value="">Selecione</option>
                                    @foreach($subcategorias as $subcategoria)
                                        <option value="{{ $subcategoria->id }}">
                                            {{ $subcategoria->nome }} ({{ $subcategoria->categoria->nome }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="editora" class="form-label">Editora</label>
                                <input type="text" id="editora" class="form-control" name="editora"
                                    placeholder="Nome da editora">
                            </div>
                            <div class="col-md-6">
                                <label for="categoria" class="form-label">Categoria</label>
                                <select name="categoria_id" id="categoria" class="form-select" required>
                                    <option value="">Selecione</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="ano_de_publicacao" class="form-label">Ano de publicação</label>
                                <input type="number" min="0" id="ano_publicacao" name="ano_de_publicacao" class="form-control"
                                    placeholder="Ex: 1927">
                            </div>
                            <div class="col-md-6">
                                <label for="status_material" class="form-label">Status do livro</label>
                                <select name="status_material" id="status_material" class="form-select">
                                    <option value="DISPONIVEL">Disponível</option>
                                    <option value="INDISPONIVEL">Indisponível</option>
                                </select>
                            </div>

                            <div class="col-12 d-flex flex-column flex-md-row align-items-start gap-3">
                                <div class="col-md-6">
                                    <label for="paginas" class="form-label">Número de Páginas</label>
                                    <input type="number" class="form-control" min="0" name="paginas" id="paginas"
                                        placeholder="Total de páginas">
                                </div>

                                <div class="col-md-6" id="div-minutos">
                                    <label for="minutos" class="form-label">Duração (em minutos)</label>
                                    <input type="number" name="minutos" id="minutos" class="form-control" min="1" placeholder="Ex: 120">
                                </div>
                            </div>

                            <div class="col-12 d-flex flex-column flex-md-row align-items-start gap-3">
                                <div class="col-md-6" id="div-arquivo-material">
                                    <label for="arquivo" class="form-label">Arquivo do material</label>
                                    <input class="form-control" type="file" name="caminho_do_arquivo" id="arquivo"
                                        accept=".pdf,.doc,.docx,.epub">
                                </div>

                                <div class="col-md-6" id="div-arquivo-audio" style="display:none;">
                                    <label for="audio" class="form-label">Arquivo de Áudio</label>
                                    <input class="form-control" type="file" name="caminho_do_audio" id="audio" accept="audio/*">
                                </div>

                                <div class="col-md-6">
                                    <label for="imagem" class="form-label">Imagem da capa</label>
                                    <input class="form-control" type="file" name="caminho_da_imagem" id="imagem" accept="image/*">
                                </div>
                            </div>


                        </div>

                        <div class="mt-4 text-end d-flex gap-2 justify-content-end">
                            <button type="button" class="btn btn-secondary px-4" id="btn-cancelar">Cancelar</button>
                            <button type="submit" class="btn btn-dark px-4">Registrar</button>
                        </div>
                    </form>

                </div>
            </div>
        </main>
    </div>

<!-- Modal de feedback -->
<div class="modal fade" id="modalFeedback" tabindex="-1" aria-labelledby="modalFeedbackLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFeedbackLabel">Mensagem</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body" id="modalFeedbackBody">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tipo = document.getElementById('tipo');
        const divMinutos = document.getElementById('div-minutos');
        const divArquivoMaterial = document.getElementById('div-arquivo-material');
        const divArquivoAudio = document.getElementById('div-arquivo-audio');
        const btnCancelar = document.getElementById('btn-cancelar');
        const form = document.querySelector('form');

        function toggleCampos() {
            if (tipo.value === 'LIVRO') {
                divMinutos.style.display = 'none';
                divArquivoMaterial.style.display = '';
                divArquivoAudio.style.display = 'none';
            } else if (tipo.value === 'AUDIOLIVRO') {
                divMinutos.style.display = '';
                divArquivoMaterial.style.display = 'none';
                divArquivoAudio.style.display = '';
            } else {
                divMinutos.style.display = '';
                divArquivoMaterial.style.display = '';
                divArquivoAudio.style.display = 'none';
            }
        }
        tipo.addEventListener('change', toggleCampos);
        toggleCampos();

        btnCancelar.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('modalFeedbackBody').innerText = 'Registro cancelado pelo usuário.';
            var modal = new bootstrap.Modal(document.getElementById('modalFeedback'));
            modal.show();
        });

        form.addEventListener('submit', function(e) {
            setTimeout(function() {
                document.getElementById('modalFeedbackBody').innerText = 'Material registrado com sucesso!';
                var modal = new bootstrap.Modal(document.getElementById('modalFeedback'));
                modal.show();
            }, 100);
        });
    });
</script>
@endsection
