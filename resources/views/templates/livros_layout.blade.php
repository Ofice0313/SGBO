<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Livros</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;900&family=Noto+Sans:wght@400;500;700;900&display=swap"
      rel="stylesheet"
    />

    <!-- Bootstrap 5 CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: Lexend, "Noto Sans", sans-serif;
      }
      .search-input {
        border: none;
        background-color: #f0f2f4;
      }
      .search-input:focus {
        box-shadow: none;
      }
      .rounded-xl {
        border-radius: 1rem !important;
      }
    </style>
  </head>
  <body class="bg-white overflow-x-hidden">
    <div class="container-fluid min-vh-100 d-flex flex-column">
        @include('nav_livros')
        <main class="container py-5 flex-grow-1">
            @yield('content')
        </main>
        @include('footer_livros')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>