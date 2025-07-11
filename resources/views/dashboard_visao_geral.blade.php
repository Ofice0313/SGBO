@extends('templates/dashboard_layout')

@section('content')

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8" />
    <title>Stitch Design</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;900&family=Noto+Sans:wght@400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: Lexend, 'Noto Sans', sans-serif;
        overflow-x: hidden;
      }
    </style>
  </head>
  <body class="bg-white">
    <div class="container-fluid min-vh-100 d-flex flex-column">
      <div class="row flex-grow-1">
        <!-- Sidebar -->
        <div class="col-12 col-md-3 col-lg-2 bg-light p-4 d-flex flex-column justify-content-between">
          <div>
            <h1 class="fs-5 fw-medium mb-4">Biblioteca Central</h1>
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M224,115.55V208a16,16,0,0,1-16,16H168a16,16,0,0,1-16-16V168a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v40a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V115.55a16,16,0,0,1,5.17-11.78l80-75.48.11-.11a16,16,0,0,1,21.53,0l80,75.59A16,16,0,0,1,224,115.55Z"
                  ></path>
                </svg>
                Visão geral
              </a>
              <a href="#" class="list-group-item list-group-item-action d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M224,48H160a40,40,0,0,0-32,16A40,40,0,0,0,96,48H32A16,16,0,0,0,16,64V192a16,16,0,0,0,16,16H96a24,24,0,0,1,24,24,8,8,0,0,0,16,0,24,24,0,0,1,24-24h64a16,16,0,0,0,16-16V64A16,16,0,0,0,224,48Z"
                  ></path>
                </svg>
                Livros
              </a>
              <a href="#" class="list-group-item list-group-item-action d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M117.25,157.92a60,60,0,1,0-66.5,0A95.83,95.83,0,0,0,3.53,195.63a8,8,0,1,0,13.4,8.74,80,80,0,0,1,134.14,0,8,8,0,0,0,13.4-8.74A95.83,95.83,0,0,0,117.25,157.92Z"
                  ></path>
                </svg>
                Usuários
              </a>
              <a href="#" class="list-group-item list-group-item-action d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M184,32H72A16,16,0,0,0,56,48V224a8,8,0,0,0,12.24,6.78L128,193.43l59.77,37.35A8,8,0,0,0,200,224V48A16,16,0,0,0,184,32Z"
                  ></path>
                </svg>
                Empréstimos
              </a>
              <a href="#" class="list-group-item list-group-item-action d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M216,40H136V24a8,8,0,0,0-16,0V40H40A16,16,0,0,0,24,56V176a16,16,0,0,0,16,16H79.36L57.75,219a8,8,0,0,0,12.5,10l29.59-37h56.32l29.59,37a8,8,0,1,0,12.5-10l-21.61-27H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Z"
                  ></path>
                </svg>
                Relatórios
              </a>
            </div>
          </div>
        </div>

        <!-- Main Content -->
        <div class="col p-4">
          <h2 class="fs-1 fw-bold mb-4">Visão geral</h2>
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

          <!-- Tabela de livros mais populares -->
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
                <tr>
                  <td>O Senhor dos Anéis</td>
                  <td>J.R.R. Tolkien</td>
                  <td>150</td>
                </tr>
                <tr>
                  <td>Orgulho e Preconceito</td>
                  <td>Jane Austen</td>
                  <td>120</td>
                </tr>
                <tr>
                  <td>1984</td>
                  <td>George Orwell</td>
                  <td>110</td>
                </tr>
                <tr>
                  <td>O Grande Gatsby</td>
                  <td>F. Scott Fitzgerald</td>
                  <td>100</td>
                </tr>
                <tr>
                  <td>Matar um Rouxinol</td>
                  <td>Harper Lee</td>
                  <td>90</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Tabela de notificações pendentes -->
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
                <tr>
                  <td>Carlos Mendes</td>
                  <td>O Senhor dos Anéis</td>
                  <td>2024-07-15</td>
                </tr>
                <tr>
                  <td>Ana Silva</td>
                  <td>Orgulho e Preconceito</td>
                  <td>2024-07-10</td>
                </tr>
                <tr>
                  <td>Pedro Almeida</td>
                  <td>1984</td>
                  <td>2024-07-05</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

@endsection