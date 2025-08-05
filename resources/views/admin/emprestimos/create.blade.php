@extends('templates/registro_de_material_layout')
@section('content')
    <h2>Novo Empréstimo</h2>
    <form action="{{ route('admin.emprestimos.store') }}" method="POST">
        @csrf

        <label>Usuário:</label>
        <select name="user_id" class="form-control">
            @foreach ($users as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
        </select>

        <label>Material:</label>
        <select name="material_id" id="material_id" class="form-control">
            <option value="">-- Selecione um Material --</option>
            @foreach ($materiais as $material)
                <option value="{{ $material->id }}">{{ $material->titulo }}</option>
            @endforeach
        </select>

        <div id="disponibilidade_msg" class="mt-2 text-sm fw-bold"></div>

        <label>Data de Retirada:</label>
        <input type="date" name="data_de_retirada" class="form-control">

        <label>Status:</label>
        <select name="status_emprestimo" class="form-control">
            @foreach (['PENDENTE', 'EMPRESTADO', 'DEVOLVIDO'] as $status)
                <option value="{{ $status }}">{{ $status }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-success mt-2">Salvar</button>
    </form>
@endsection
