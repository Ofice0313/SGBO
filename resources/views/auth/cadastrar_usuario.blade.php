@extends('templates/registro_de_material_layout')
@section('content')
    <div class="bg-light p-5 rounded shadow-lg container max-w-4xl">
        <div class="row g-4">
            <!-- Imagem -->
            <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuC8LDza2lilsBRrgM5ZobqWtKjQor4S9aL6uZyQcrCaoTeWlhkgPvk_D7pruIF4culEydfV_moa6olcHqumxfEVKIkXMM5itPKBVVpg5bfujAOWfdS--J8DutskOt6tdm5bOKEDwPqZ0KbVORdK31PS8z1o26ddIkgXNGkopWz4W2L6xLcBME1MxIs9zaqXsCL6yaGPrR4CiD-IgP22caMlCikPOKm7urq0Z3O4EG3v_5LqolUUsF_AB7g3czZNZizUznX5YbCOdn6q"
                    alt="A smiling female student holding a red book and wearing headphones around her neck"
                    class="rounded img-cover">
            </div>
            <!-- Formulário -->
            <div class="col-md-6">
                <h2 class="text-center mb-4 fw-bold">Registrar-me</h2>
                <form action="{{ route('cadastrar_usuario') }}" method="POST" enctype="multipart/form-data">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome"
                                placeholder="Digite o teu nome">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Digite o teu email">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" id="telefone" placeholder="Telefone">
                        </div>
                        <div class="col-md-6">
                            <label for="instituicao" class="form-label">Instituição</label>
                            <div class="select-wrapper">
                                <select id="instituicao" name="instituicao" class="form-select">
                                    <option value="">Selecione</option>
                                    <option value="LORE">Lore</option>
                                    <option value="ISLORE">IsLore</option>
                                    <option value="FOCO">FOCO</option>
                                </select>
                            </div>
                        </div>
                    </div>

                     <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço">
                        </div>
                        <div class="col-md-6">
                            <label for="curso_id" class="form-label">Curso</label>
                            <div class="select-wrapper">
                                <select name="curso_id" required class="form-select">
                                    <option value="">-- Selecione o Curso --</option>
                                    <option value="Programação">Programação</option>
                                    <option value="Redes">Redes</option>
                                    <option value="Enfermagem Geral">Enfermagem Geral</option>
                                    <option value="Mecânica">Mecânica</option>
                                    <option value="Electricidade">Electricidade</option>
                                    @foreach ($cursos as $curso)
                                        <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                                    @endforeach
                                </select>
                               
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Repita a password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation" placeholder="Repita a password">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark w-100">Registrar-me</button>

                    <p class="text-center mt-3 small">
                        Já tem uma conta? <a href="{{ url('login') }}"
                            class="text-decoration-none text-primary fw-medium">Entrar</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
