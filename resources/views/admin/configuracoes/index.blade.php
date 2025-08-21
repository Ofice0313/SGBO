@extends('templates/cursos_layout')
@section('content')
<div class="container py-4">
    <h2 class="mb-4">Configurações de Usuários</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Role</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->nome ?? '-' }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        @if($user->role === 'USER')
                            <form action="{{ route('configuracoes.promover', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-success btn-sm" type="submit">Promover a ADMIN</button>
                            </form>
                        @elseif($user->role === 'ADMIN')
                            <form action="{{ route('configuracoes.despromover', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-warning btn-sm" type="submit">Despromover para USER</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection