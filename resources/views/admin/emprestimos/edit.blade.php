@extends('templates/registro_de_material_layout')
@section('content')
    <h2>Editar Empréstimo</h2>
    <form action="{{ route('admin.emprestimos.update', $emprestimo) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Usuário:</label>
        <select name="user_id" class="form-control">
            @foreach ($users as $u)
                <option value="{{ $u->id }}" {{ $emprestimo->user_id == $u->id ? 'selected' : '' }}>
                    {{ $u->name }}</option>
            @endforeach
        </select>

        <label>Material:</label>
        <select name="material_id" class="form-control">
            @foreach ($materiais as $m)
                <option value="{{ $m->id }}" {{ $emprestimo->material_id == $m->id ? 'selected' : '' }}>
                    {{ $m->titulo }}</option>
            @endforeach
        </select>

        <label>Data de Retirada:</label>
        <input type="date" name="data_de_retirada" class="form-control" value="{{ $emprestimo->data_de_retirada }}">

        <label>Status:</label>
        <select name="status_emprestimo" class="form-control">
            @foreach (['PENDENTE', 'EMPRESTADO', 'DEVOLVIDO'] as $status)
                <option value="{{ $status }}" {{ $emprestimo->status_emprestimo == $status ? 'selected' : '' }}>
                    {{ $status }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-success mt-2">Atualizar</button>
    </form>
@endsection
