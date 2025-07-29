@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Subcategoria</h2>
        <form action="{{ route('admin.subcategorias.update', $subcategoria) }}" method="POST">
            @csrf @method('PUT')

            <label>Nome:</label>
            <input type="text" name="nome" value="{{ $subcategoria->nome }}" class="form-control" required>

            <label>Categoria:</label>
            <select name="categoria_id" class="form-control">
                @foreach ($categorias as $c)
                    <option value="{{ $c->id }}" {{ $subcategoria->categoria_id == $c->id ? 'selected' : '' }}>
                        {{ $c->nome }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-success mt-2">Actualizar</button>
        </form>
    </div>
@endsection
