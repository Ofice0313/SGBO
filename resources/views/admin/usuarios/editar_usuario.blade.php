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
                <h2 class="text-center mb-4 fw-bold">Editar Usuário</h2>
                <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" >
                    @csrf
                    @method('PUT')
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="nome"
                                value="{{ $usuario->nome }}" placeholder="Digite o teu nome">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $usuario->email }}" placeholder="Digite o teu email">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone"
                                value="{{ $usuario->telefone }}" placeholder="Telefone">
                        </div>
                        <div class="col-md-6">
                            <label for="instituicao" class="form-label">Instituição</label>
                            <div class="select-wrapper">
                                <select id="instituicao" name="instituicao" class="form-select">
                                    <option value="">Selecione</option>
                                    <option value="LORE"
                                        {{ $usuario->instituicao == 'LORE' ? 'selected' : '' }}>Lore
                                    </option>
                                    <option value="ISLORE"
                                        {{ $usuario->instituicao == 'ISLORE' ? 'selected' : '' }}>IsLore
                                    </option>
                                    <option value="FOCO"
                                        {{ $usuario->instituicao == 'FOCO' ? 'selected' : '' }}>FOCO
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco"
                            value="{{ $usuario->endereco }}" placeholder="Endereço">
                    </div>
                    <div class="mb-3">
                        <label for="curso" class="form-label">Curso</label>
                        <input type="text" class="form-control" id="curso" name="curso"
                            value="{{ $usuario->curso ? $usuario->curso->nome : $usuario->curso_id }}"
                            placeholder="Nome do curso">
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="col-md-6">
                            <label for="repeat-password" class="form-label">Repita a password</label>
                            <input type="password" class="form-control" id="repeat-password" name="repeat-password"
                                placeholder="Repita a password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Salvar Alterações</button>
                </form>
            </div>
        </div>
    </div>
@endsection
