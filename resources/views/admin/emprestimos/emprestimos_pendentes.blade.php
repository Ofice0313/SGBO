@extends('templates/registro_de_material_layout')
@section('content')
    <h1 class="h3 fw-bold mb-4">Emprestimos a Validar</h1>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nome do usuário</th>
                    <th>Titulo do Material</th>
                    <th>Data de Retirada</th>
                    <th>Data de Devolução</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emprestimo as $emp)
                    <tr>
                        <td>{{ $emp->user->nome }}</td>
                        <td>{{ $emp->material->titulo }}</td>
                        <td>{{ $emp->data_de_retirada }}</td>
                        <td>{{ $emp->data_de_devolucao }}</td>
                        <td>
                            <form action="{{ route('adminemprestimos.validar', $emp->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <textarea name="nota_antes_do_emprestimo" class="form-control" placeholder="Estado do material"></textarea>
                                <button class="btn btn-success btn-sm mt-1">Validar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
