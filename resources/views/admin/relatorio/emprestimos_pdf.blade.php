@extends('templates/subcategorias_layout')
@section('content')
    <h2 style="font-family: Arial, sans-serif; color: #333; text-align: center; margin-bottom: 20px; font-size: 24px;">Relatório de Empréstimos</h2>
    <table style="width: 100%; border-collapse: collapse; margin: 0 auto; font-family: Arial, sans-serif;">
        <thead>
            <tr>
                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 8px; text-align: left; font-weight: bold; color: #333;">ID</th>
                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 8px; text-align: left; font-weight: bold; color: #333;">Usuário</th>
                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 8px; text-align: left; font-weight: bold; color: #333;">Material</th>
                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 8px; text-align: left; font-weight: bold; color: #333;">Data de Empréstimo</th>
                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 8px; text-align: left; font-weight: bold; color: #333;">Data de Devolução</th>
                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 8px; text-align: left; font-weight: bold; color: #333;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($emprestimos as $emprestimo)
                <tr style="{{ $loop->iteration % 2 === 0 ? 'background-color: #f9f9f9;' : '' }}">
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $emprestimo->id }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $emprestimo->user->nome ?? '-' }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $emprestimo->material->titulo ?? '-' }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $emprestimo->data_de_retirada }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $emprestimo->data_de_devolucao }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $emprestimo->status_emprestimo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
