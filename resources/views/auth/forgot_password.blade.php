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

                <form action="">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label text-dark">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Digite o teu email">
                    </div>
                    
                    <button type="submit" class="btn btn-dark w-100">Enviar email</button>
                </form>

                <p class="text-center mt-4 small">Não tem uma conta?
                    <a class="text-primary text-decoration-none" href="{{ url('create')}}">
                        Criar conta</a>
                </p>
                <br>
                <p class="text-center mt-4 small">Tens uma conta?
                    <a class="text-primary text-decoration-none" href="{{ url('login')}}">
                        Entrar</a>
                </p>
            </div>
        </div>
    </div>
@endsection
