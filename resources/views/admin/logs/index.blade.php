@extends('templates/cursos_layout')
@section('content')
<div class="container py-4">
    <h2 class="mb-4">Logs de Usuários</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Email</th>
                <th>Quantidade de Acessos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->user ? $log->user->nome : 'Desconhecido' }}</td>
                    <td>{{ $log->user ? $log->user->email : '-' }}</td>
                    <td>{{ $log->tentativas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection