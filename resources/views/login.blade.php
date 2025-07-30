@extends('templates/login_layout')

@section('content')
    <div class="container">
        <div class="row shadow-lg rounded overflow-hidden">
            <!-- Imagem -->
            <div class="col-md-6 d-none d-md-block p-0">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuA9y3cnVUUrPKVbNsV3BmQP1rKmKs6By0RbuoLN0LS6uEz0wSVQ_gWjPUiDcMeQ7QDypT6NR9kgHbQTM5y4sA2q49VAqVST8ir7WfEVGqQ8B0XxciaqXK82QIZmpMdWKEJtrJU2h5onCKbMQo7VABvHddwPOOzlr--w0kam4ixyvO_lqN-opM2KIv7hBp8Sc279uw7yJxZ2J8s2rjSevgXkKOV5oRq7yDeh9rvZdtZ-8UwM-biPZCZcoKt3rShEi1D2ZPO9kHgTiwsf"
                    alt="Estudante sorridente" class="w-100 h-100" style="object-fit: cover;">
            </div>

            <!-- Formulário -->
            <div class="col-md-6 bg-light p-5 d-flex flex-column justify-content-center">
                <div class="text-center mb-4">
                    <span class="material-icons fs-1 text-secondary">account_balance</span>
                    <h1 class="h4 fw-bold text-dark mt-2">Biblioteca Online</h1>
                </div>

                <form method="POST" action="{{ route('login_submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label text-dark">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Digite o teu email">
                    </div>
                    <div class="mb-3">
                        <label for="instituicao" class="form-label text-dark">Instituição</label>
                        <div class="select-wrapper">
                            <select name="instituicao" id="instituicao" class="form-select" required>
                                <option value="">Selecione</option>
                                <option value="LORE">Lore</option>
                                <option value="ISLORE">IsLore</option>
                                <option value="FOCO">FOCO</option>
                            </select>
                            <span class="material-icons text-secondary">expand_more</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label text-dark">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Digite o password">
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Login</button>
                </form>

                <p class="text-center mt-4 small">
                    <a class="text-primary text-decoration-none" href="#">Não tem uma conta?
                        Criar conta</a>
                </p>
            </div>
        </div>
    </div>
@endsection
