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
                <h2 class="text-center mb-4 fw-bold">Editar Curso</h2>
                <form method="POST" action="{{ route('admin.cursos.update', $cursos->id) }}" >
                    @csrf
                    @method('PUT')
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="{{ $curso->nome }}" placeholder="Digite o nome do curso">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark w-100">Salvar Alterações</button>
                </form>
            </div>
        </div>
    </div>
@endsection
