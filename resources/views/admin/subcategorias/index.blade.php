@extends('templates/registro_de_material_layout')
@section('content')
<div class="container">
    <h2>Subcategorias</h2>
    <a href="{{ route('admin.subcategorias.create') }}" class="btn btn-primary mb-2">Nova Subcategoria</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subcategorias as $sub)
                <tr>
                    <td>{{ $sub->id }}</td>
                    <td>{{ $sub->nome }}</td>
                    <td>{{ $sub->categoria->nome ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.subcategorias.edit', $sub) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.subcategorias.destroy', $sub) }}" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Desejas eliminar?')" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if($subcategorias->isEmpty())
                <tr><td colspan="4" class="text-center">Nenhuma subcategoria cadastrada.</td></tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
