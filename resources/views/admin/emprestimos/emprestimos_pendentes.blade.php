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
                    <th>Status do Empréstimo</th>
                    <th>Validar</th>
                    <th>Confirmar Devolução</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emprestimo as $emp)
                    <tr>
                        <td>{{ $emp->user->nome }}</td>
                        <td>{{ $emp->material->titulo }}</td>
                        <td>{{ $emp->data_de_retirada }}</td>
                        <td>{{ $emp->data_de_devolucao }}</td>
                        <td>{{ $emp->status_emprestimo }}</td>
                        <td>
                            @if ($emp->status_emprestimo == 'PENDENTE')
                                <form action="{{ route('adminemprestimos.validar', $emp->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <textarea name="nota_antes_do_emprestimo" class="form-control" placeholder="Estado do material"></textarea>
                                    <button class="btn btn-success btn-sm mt-1">Validar</button>
                                </form>
                            @elseif($emp->status_emprestimo == 'AGUARDANDO_CONFIRMACAO_DE_LEVANTAMENTO')
                                <form action="{{ route('adminemprestimos.entregar', $emp->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success btn-sm mt-1">Confirmar Entrega</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            @if($emp->status_emprestimo == 'PEDIDO_DE_SOLICITACAO_DE_DEVOLUCAO')
                                <form action="{{ route('adminemprestimos.aceitarPedidoDeDevolucao', $emp->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success btn-sm mt-1">Aceitar</button>
                                </form>
                            @elseif($emp->status_emprestimo == 'DEVOLVER')
                                <form action="{{ route('adminemprestimos.confirmarDevolucao', $emp->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <textarea name="nota_apos_emprestimo" class="form-control" placeholder="Estado do material"></textarea>
                                    <button class="btn btn-success btn-sm mt-1">Confirmar devolução</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
