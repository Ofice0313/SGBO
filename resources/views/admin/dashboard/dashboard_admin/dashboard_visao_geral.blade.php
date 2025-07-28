@extends('admin/dashboard/layout/dashboard_layout')
@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container-fluid">
    <h1 class="fs-1 fw-bold mb-4">Visão geral</h1>
    <div class="row g-3 mb-5">
        <div class="col-md-4">
            <div class="p-4 bg-light rounded">
                <p class="fw-medium mb-1">Total de livros</p>
                <h4>12,450</h4>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-light rounded">
                <p class="fw-medium mb-1">Usuários registrados</p>
                <h4>3,200</h4>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-light rounded">
                <p class="fw-medium mb-1">Empréstimos ativos</p>
                <h4>850</h4>
            </div>
        </div>
    </div>
    <h3 class="fw-bold mb-3">Livros mais populares</h3>
    <div class="table-responsive mb-5">
        <table class="table table-bordered">
            <thead>
                <tr class="table-light">
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Empréstimos</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <h3 class="fw-bold mb-3">Notificações pendentes de devolução</h3>
    <div class="table-responsive mb-5">
        <table class="table table-bordered">
            <thead>
                <tr class="table-light">
                    <th>Usuário</th>
                    <th>Livro</th>
                    <th>Data de devolução</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.nav-link').on('click', function(e){
            e.preventDefault();
            var url = $(this).data('url');
            $.get(url, function(data){
                $('#main-content').html(data);
            });
        });
    });
</script>
@endpush
