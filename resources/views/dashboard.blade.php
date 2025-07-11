@extends('templates/dashboard_layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard de Gerenciamento de Estudantes</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;900&family=Noto+Sans:wght@400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <!-- Bootstrap 5 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: Lexend, "Noto Sans", sans-serif;
      }
      .avatar {
        background-size: cover;
        background-position: center;
      }
    </style>
  </head>
  <body class="bg-white">
    <div class="container-fluid min-vh-100 d-flex flex-column overflow-hidden">
      <header class="d-flex justify-content-between align-items-center border-bottom px-4 py-3">
        <div class="d-flex align-items-center gap-2 text-dark">
          <div style="width: 1.5rem;">
            <!-- SVG Logo -->
            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" width="100%">
              <!-- Paths same as original -->
              <path
                d="M39.5563 34.1455V13.8546C39.5563 15.708 36.8773 17.3437 32.7927 18.3189C30.2914 18.916 27.263 19.2655 24 19.2655C20.737 19.2655 17.7086 18.916 15.2073 18.3189C11.1227 17.3437 8.44365 15.708 8.44365 13.8546V34.1455C8.44365 35.9988 11.1227 37.6346 15.2073 38.6098C17.7086 39.2069 20.737 39.5564 24 39.5564C27.263 39.5564 30.2914 39.2069 32.7927 38.6098C36.8773 37.6346 39.5563 35.9988 39.5563 34.1455Z"
                fill="currentColor"
              ></path>
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M10.4485 13.8519C10.4749 13.9271 10.6203 14.246 11.379 14.7361C12.298 15.3298 13.7492 15.9145 15.6717 16.3735C18.0007 16.9296 20.8712 17.2655 24 17.2655C27.1288 17.2655 29.9993 16.9296 32.3283 16.3735C34.2508 15.9145 35.702 15.3298 36.621 14.7361C37.3796 14.246 37.5251 13.9271 37.5515 13.8519C37.5287 13.7876 37.4333 13.5973 37.0635 13.2931C36.5266 12.8516 35.6288 12.3647 34.343 11.9175C31.79 11.0295 28.1333 10.4437 24 10.4437C19.8667 10.4437 16.2099 11.0295 13.657 11.9175C12.3712 12.3647 11.4734 12.8516 10.9365 13.2931C10.5667 13.5973 10.4713 13.7876 10.4485 13.8519ZM37.5563 18.7877C36.3176 19.3925 34.8502 19.8839 33.2571 20.2642C30.5836 20.9025 27.3973 21.2655 24 21.2655C20.6027 21.2655 17.4164 20.9025 14.7429 20.2642C13.1498 19.8839 11.6824 19.3925 10.4436 18.7877V34.1275C10.4515 34.1545 10.5427 34.4867 11.379 35.027C12.298 35.6207 13.7492 36.2054 15.6717 36.6644C18.0007 37.2205 20.8712 37.5564 24 37.5564C27.1288 37.5564 29.9993 37.2205 32.3283 36.6644C34.2508 36.2054 35.702 35.6207 36.621 35.027C37.4573 34.4867 37.5485 34.1546 37.5563 34.1275V18.7877Z"
                fill="currentColor"
              ></path>
            </svg>
          </div>
          <h2 class="h5 fw-bold mb-0">Biblioteca Online</h2>
        </div>
        <div class="d-flex align-items-center gap-3">
          <nav class="d-flex gap-3">
            <a class="text-decoration-none text-dark fw-medium" href="#">Início</a>
            <a class="text-decoration-none text-dark fw-medium" href="#">Materiais</a>
            <a class="text-decoration-none text-dark fw-medium" href="#">Estudantes</a>
            <a class="text-decoration-none text-dark fw-medium" href="#">Emprestimos</a>
          </nav>
          <button class="btn btn-light rounded-pill d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
              <path
                d="M221.8,175.94C216.25,166.38,208,139.33,208,104a80,80,0,1,0-160,0c0,35.34-8.26,62.38-13.81,71.94A16,16,0,0,0,48,200H88.81a40,40,0,0,0,78.38,0H208a16,16,0,0,0,13.8-24.06ZM128,216a24,24,0,0,1-22.62-16h45.24A24,24,0,0,1,128,216ZM48,184c7.7-13.24,16-43.92,16-80a64,64,0,1,1,128,0c0,36.05,8.28,66.73,16,80Z"
              ></path>
            </svg>
          </button>
          <div
            class="rounded-circle avatar"
            style="width: 40px; height: 40px; background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBikRo0COXhAMWyozQdZCeMuQqL61s0RZz6DAxWT9HDHDP3TV-KSU8x46y1bR7J_2H7BhMgfbayo_t6g5aETsgPke-5FrB7ystfvwmlmpIPx940hcyNHG4utMLj0CUlT0ni-oytgkSRDERCfvZ_s6HaIalCbltHCqZkTsW7ySMzN9BZ9l_iz1QY_9cTxaSIJDsxwkC8xT9T0ceAgnQbilCy1e9v1CB0KuGfA9zc1Ogk0hAbD1TW5phTtpXKE9D-6UPd8cUuXKrJqbXZ');"
          ></div>
        </div>
      </header>
      <main class="flex-fill px-5 py-4">
        <div class="mx-auto" style="max-width: 960px;">
          <div class="mb-4">
            <h3 class="fw-bold text-dark">Gerenciamento de Estudantes</h3>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr class="table-light">
                  <th>Nome do Estudante</th>
                  <th>Curso</th>
                  <th>Status</th>
                  <th>Empréstimos</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Doropa António Hele</td>
                  <td>Programação</td>
                  <td><button class="btn btn-light btn-sm rounded-pill">Inactivo</button></td>
                  <td>12</td>
                </tr>
                <tr>
                  <td>Carlos Zunguze</td>
                  <td>Mecânica</td>
                  <td><button class="btn btn-light btn-sm rounded-pill">Activo</button></td>
                  <td>8</td>
                </tr>
                <tr>
                  <td>Olivia Davis</td>
                  <td>Phicologia</td>
                  <td><button class="btn btn-light btn-sm rounded-pill">Inactivo</button></td>
                  <td>5</td>
                </tr>
                <tr>
                  <td>Noah Wilson</td>
                  <td>Enginharia Informática</td>
                  <td><button class="btn btn-light btn-sm rounded-pill">Activo</button></td>
                  <td>15</td>
                </tr>
                <tr>
                  <td>Timóteo</td>
                  <td>Biologia</td>
                  <td><button class="btn btn-light btn-sm rounded-pill">Inactivo</button></td>
                  <td>3</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
    <!-- Bootstrap 5 JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
@endsection