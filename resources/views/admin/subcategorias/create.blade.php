@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Nova Subcategoria</h2>
        <form action="{{ route('admin.subcategorias.store') }}" method="POST">
            @csrf

            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" required>

            <label>Categoria:</label>
            <select name="categoria_id" class="form-control">
                @foreach ($categorias as $c)
                    <option value="{{ $c->id }}">{{ $c->nome }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-success mt-2">Salvar</button>
        </form>
    </div>
@endsection
