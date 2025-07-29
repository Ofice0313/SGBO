@extends('templates/registro_de_material_layout')
@section('content')
<div class="container">
    <h2>Editar Categoria</h2>

    <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Categoria</label>
            <input type="text" class="form-control" name="nome" value="{{ old('nome', $categoria->nome) }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
