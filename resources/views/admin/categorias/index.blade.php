@extends('templates/categorias_layout')
@section('content')
    <h1 class="h3 fw-bold mb-4">Categoria</h1>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form class="d-flex" style="max-width: 400px;" method="GET" action="">
            <input class="form-control me-2" type="search" name="q" value="" placeholder="Pesquisar categoria..."
                aria-label="Pesquisar">
            <button class="btn btn-outline-secondary" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11 6a5 5 0 1 1-10 0 5 5 0 0 1 10 0zm-1.293 6.707a6 6 0 1 0-1.414-1.414l3.85 3.85a1 1 0 0 0 1.415-1.415l-3.85-3.85z" />
                </svg>
            </button>
        </form>

        <a href="" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-person-plus" viewBox="0 0 16 16">
                <path
                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm4.5 8a5.5 5.5 0 1 1-9-4.5A5.5 5.5 0 0 1 10.5 16zm-4.5-1a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9z" />
                <path
                    d="M15 8a.5.5 0 0 1-.5.5H13v1.5a.5.5 0 0 1-1 0V8.5h-1.5a.5.5 0 0 1 0-1H12V6a.5.5 0 0 1 1 0v1.5h1.5A.5.5 0 0 1 15 8z" />
            </svg>
            Adicionar Categoria
        </a>
    </div>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>Id</th>
                    <th>Nome da Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nome }}</td>
                        <td class="d-flex align-items-center gap-2">
                            <form action="" method="POST" style="display:inline;"
                                onsubmit="return confirm('Tem certeza que deseja excluir este categoria?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-decoration-none text-dark p-0 m-0"
                                    title="Excluir">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </button>
                            </form>

                            <a href="" class="text-decoration-none text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </a>

                            <a href="#" class="text-decoration-none text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                    <path
                                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
