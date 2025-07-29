@extends('templates/registro_de_material_layout')
@section('content')
    <div class="container">
        <h2>Lista de Empréstimos</h2>

        <a href="{{ route('admin.emprestimos.create') }}" class="btn btn-primary mb-3">Novo Empréstimo</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Material</th>
                    <th>Data de Retirada</th>
                    <th>Status</th>
                    <th>Multa</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emprestimos as $emprestimo)
                    <tr>
                        <td>{{ $emprestimo->id }}</td>
                        <td>{{ $emprestimo->user->name ?? 'N/A' }}</td>
                        <td>{{ $emprestimo->material->titulo ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($emprestimo->data_de_retirada)->format('d/m/Y') }}</td>
                        <td>{{ $emprestimo->status_emprestimo }}</td>
                        <td>MT {{ number_format($emprestimo->multa, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('admin.emprestimos.edit', $emprestimo) }}"
                                class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('admin.emprestimos.destroy', $emprestimo) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Tens certeza que desejas eliminar?')"
                                    class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($emprestimos->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">Nenhum empréstimo encontrado.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
