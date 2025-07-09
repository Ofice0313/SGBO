@extends('templates/register_users_layout')
@section('content')
<section class="bg-dark py-3">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase text-center">Registrar-me</h3>

                <form action="{{ route('register_submit_users') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o teu nome"/>
                    </div>
                  </div>

                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Digite o teu email" required/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                        <label class="telefone" for="telefone">Telefone</label>
                      <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone"/>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                     <label class="form-label" for="instituicao">Instituição</label>
                        <select name="instituicao" id="instituicao" class="form-select" required>
                            <option value="">Selecione</option>
                            <option value="LORE">Lore</option>
                            <option value="ISLORE">IsLore</option>
                            <option value="FOCO">FOCO</option>
                        </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="endereco">Endereço</label>
                        <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Digite o teu endereço"/>
                    </div>
                  </div>

                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="curso">Curso</label>
                        <input type="text" id="curso" name="curso" class="form-control" placeholder="Digite o teu curso" required/>
                    </div>
                  </div>
                </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label">Repita a Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Repita a password" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Registrar-me</button>

                    <div class="text-center mt-3">
                        Já tem uma conta? <a href="{{ route('login') }}">Entrar</a>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection