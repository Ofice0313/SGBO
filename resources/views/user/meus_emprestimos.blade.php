@extends('templates/registro_de_material_layout')
@section('content')
    <h1 class="h3 fw-bold mb-4">Meus Emprestimos</h1>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>Material</th>
                    <th>Tipo de Material</th>
                    <th>Data de Retirada</th>
                    <th>Data de Devolução</th>
                    <th>Status do Empréstimo</th>
                    <th>Multa</th>
                    <th>Unidade</th>
                    <th>Ações</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($meus_emprestimos as $emp)
                    <tr>
                        <td>{{ $emp->material->titulo }}</td>
                        <td>{{ $emp->material->tipo }}</td>
                        <td>{{ $emp->data_de_retirada }}</td>
                        <td>{{ $emp->data_de_devolucao }}</td>
                        <td>{{ $emp->status_emprestimo }}</td>
                        <td>{{ $emp->multa }}</td>
                        <td>{{ $emp->unidades }}</td>
                        <td>
                            @if ($emp->status_emprestimo == 'VALIDADO')
                                <form action="{{ route('emprestimos.Levantar', $emp->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-warning btn-sm">Levantar</button>
                                </form>
                            @elseif($emp->status_emprestimo == 'AGUARDANDO_CONFIRMACAO_DE_ENTREGA')
                                <form action="{{ route('emprestimos.confirmarLevantamento', $emp->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-warning btn-sm">
                                        Confirmar Levantamento
                                    </button>
                                </form>
                            @endif

                        </td>
                        <td>
                            @if($emp->status_emprestimo == 'EMPRESTADO')
                                <form action="{{ route('emprestimos.solicitarDevolucao', $emp->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-warning btn-sm">Solicitar Devolucao</button>
                                </form>
                            @elseif($emp->status_emprestimo == 'AGUARDANDO_DEVOLUCAO')
                                <form action="{{ route('emprestimos.devolver', $emp->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-warning btn-sm">Devolver</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
