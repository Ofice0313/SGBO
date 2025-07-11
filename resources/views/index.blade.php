@extends('templates/register_layout')

@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Materiais</h4>
        <a href="{{ route('register_materiais') }}" class="btn btn-primary">
            <i class="bi bi-plus-square me-2"></i>Adicionar novo Material
        </a>
    </div>

    <!-- ✅ Barra de pesquisa logo abaixo do título -->
    <form action="{{ route('index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Pesquisar por título...">
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i> Buscar
            </button>
        </div>
    </form>

    <div class="table-responsive">
        <table id="materiaisTable" class="table">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Imagem</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Subcategoria</th>
                    <th>Tipo de Materia</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materiais as $material)
                <tr>
                    <td>{{ $material->id }}</td>
                    <td>
                        <img src="{{ asset('storage/imagens/'.$material->caminho_da_imagem) }}"
                             alt="Capa" width="50">
                    </td>
                    <td>{{ $material->titulo }}</td>
                    <td>{{ $material->autor }}</td>
                    <td>{{ $material->subcategoria }}</td>
                    <td>{{ $material->tipo }}</td>
                    <td>
                        <a href="{{ route('edit_materiais', $material->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('delete', $material->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" onclick="return confirm('Tem certeza que quer excluir?')" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@if(!empty($datatables))
<script>
    $(document).ready(function() {
        $('#materiaisTable').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/pt-BR.json"
            },
            pageLength: 10
        });
    });
</script>
@endif

@endsection
