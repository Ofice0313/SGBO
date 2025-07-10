@extends('templates/login_layout')
@section('content')
<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="{{ route('login_submit') }}" method="post">
                    @csrf
                  <div class="d-flex align-items-center mb-3 pb-1">
                   <i class="bi bi-collection"></i>
                    <span class="h1 fw-bold mb-0">Biblioteca Online</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Entre com a sua conta</h5>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="email" />
                  </div>

                  <div class="form-outline mb-4">
                     <label class="form-label" for="instituicao">Instituição</label>
                        <select name="instituicao" id="instituicao" class="form-select" required>
                            <option value="">Selecione</option>
                            <option value="LORE">Lore</option>
                            <option value="ISLORE">IsLore</option>
                            <option value="FOCO">FOCO</option>
                        </select>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="password"/>
                  </div>

                  <div class="pt-1 mb-4">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block w-100" type="submit">Entrar</button>
                  </div>

                  <a class="small text-muted" href="#!">Esqueceu o password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Não tens conta? <a href="{{ route('register_users') }}"
                      style="color: #393f81;">Registri-se aqui</a></p>
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