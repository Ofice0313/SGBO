@extends('templates/registro_de_material_layout')
@section('content')
<div class="container py-5">
    <header class="mb-4">
        <h1 class="h4 fw-bold">Solicitações de Empréstimo Pendentes</h1>
    </header>

    <main class="bg-light p-4 rounded shadow">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Usuário</th>
                    <th>Curso</th>
                    <th>Título do Material</th>
                    <th>Data de Retirada</th>
                    <th>Data de Devolução</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($emprestimos as $emprestimo)
                    <tr>
                        <td>{{ $emprestimo->user->name }}</td>
                        <td>{{ $emprestimo->user->curso ?? 'Não informado' }}</td>
                        <td>{{ $emprestimo->material->titulo }}</td>
                        <td>{{ $emprestimo->data_de_retirada }}</td>
                        <td>{{ $emprestimo->data_de_devolucao }}</td>
                        <td>{{ $emprestimo->status_emprestimo }}</td>
                        <td>
                            @if($emprestimo->status_emprestimo == 'PENDENTE')
                                <form action="{{ route('emprestimos.aprovar', $emprestimo->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-success btn-sm">Autorizar</button>
                                </form>

                                <form action="{{ route('emprestimos.rejeitar', $emprestimo->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-danger btn-sm">Rejeitar</button>
                                </form>
                            @else
                                <span class="text-muted">Já processado</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</div>
@endsection
