@extends('templates/registro_de_material_layout')
@section('content')
<div class="container">
    <h2>Nova Categoria</h2>

    <form action="{{ route('admin.categorias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Categoria</label>
            <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
