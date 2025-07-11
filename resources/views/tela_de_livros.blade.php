@extends('templates/dashboard_layout')

@section('content')
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

      <header class="border-bottom border-light py-3 px-4 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-4">
          <div class="d-flex align-items-center gap-2">
            <svg width="32" height="32" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
    
            </svg>
            <h2 class="h5 fw-bold mb-0 text-dark">Bibliotecca Online</h2>
          </div>
          <nav class="d-flex gap-4">
            <a href="#" class="text-dark text-decoration-none">Início</a>
            <a href="#" class="text-dark text-decoration-none">Livros</a>
          </nav>
        </div>

        <div class="d-flex align-items-center gap-3">
          <div class="input-group w-auto">
            <span class="input-group-text bg-light border-0 rounded-start">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 256 256">
                <path
                  d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"
                ></path>
              </svg>
            </span>
            <input
              type="text"
              class="form-control search-input rounded-end"
              placeholder="pesquise"
            />
          </div>

          <button class="btn btn-light rounded-circle p-2">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 256 256">
              <path
                d="M221.8,175.94C216.25,166.38,208,139.33,208,104a80,80,0,1,0-160,0c0,35.34-8.26,62.38-13.81,71.94A16,16,0,0,0,48,200H88.81a40,40,0,0,0,78.38,0H208a16,16,0,0,0,13.8-24.06ZM128,216a24,24,0,0,1-22.62-16h45.24A24,24,0,0,1,128,216ZM48,184c7.7-13.24,16-43.92,16-80a64,64,0,1,1,128,0c0,36.05,8.28,66.73,16,80Z"
              ></path>
            </svg>
          </button>

          <div class="rounded-circle overflow-hidden" style="width: 40px; height: 40px; background-size: cover; background-position: center; background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAMeyYIMNSOwMxmBA3l0XofUtGLhrgn6WSwZJz0y2y9cDPro5H2KUYL8f0J34eBLXUM941O2WM4j4iGI_O8AZe6_sZqIwdF-KH_F7TKadirCoxug5sfApfltnTG0TBKr0uPsQS8DlR1A1JlPH42i4POEdN0TnqPZuRna-Vgb0h-PSF82TRIveUOhPYHr6gPWuxC7Z7FQbITalO-iGc8iZsfZb9ViYMEQHcLee3kEqxVT-HvJ3i5a4tGu7VTFNrVTxG4Z_C9MxEr1zXv');">
          </div>
        </div>
      </header>

      <main class="container py-5 flex-grow-1">
        <div class="mb-4">
          <h1 class="display-5 fw-bold">Livros</h1>
          <p class="text-muted">Explore nossa ampla coleção de livros de vários categorias e subcategorias</p>
        </div>

        <!-- Filtros -->
        <div class="mb-4 d-flex flex-wrap gap-2">
          <button class="btn btn-light rounded-pill">Todos</button>
          <button class="btn btn-light rounded-pill">Categorias</button>
          <button class="btn btn-light rounded-pill">Subcategorias</button>
          <button class="btn btn-light rounded-pill">Tipo</button>
        </div>

        <!-- Books Grid -->
        <div class="row g-4">
          <!-- Book Item -->
          <div class="col-6 col-sm-4 col-md-3">
            <div class="card border-0">
              <div 
                    class="w-100 rounded overflow-hidden" 
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAW9scT88nfg7tPfVGMU-m969uys-zf62Ec1KYzN6juEJSaMDy5WK6s7kChooh4jGpGLqz1TA4COuDVde4bUht6xkEbHspkXS4FLJ-2M75cTksUhahANF4FtRekldy0tFo4xP2kDvBJJPcu6vSoDv5U8Ek_M9A2uOyUzQSXhUX1MguZm1eOIuM9Ic0KM7ZtoQIBVgM0NDUEyzbm_cU2ZV8d-o_jEo8PY6b_uANdbLYED2A7J7md7OAIFmLTbdfq7uv8B4PBApUPXjB9'); 
                        background-size: cover; 
                        background-position: center; 
                        aspect-ratio: 3/4;">
                </div>

              <div class="mt-2">
                <h6 class="mb-0 text-dark fw-semibold">O Jardim Secreto</h6>
                <small class="text-muted">Frances Hodgson Burnett</small>
              </div>
            </div>
          </div>
          
          <div class="col-6 col-sm-4 col-md-3">
            <div class="card border-0">
                <div 
                class="w-100 rounded overflow-hidden"
                style="
                    background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCR2H3ygE29USMyKJ7u9iIYhLaljmk-MQ7qPel2odmhR-7P-kmJOgAqS_G0pNAV4PxLgeQca8cEMFuMiIzEPZC1H-UeOWf8VcnkgrAsYWGLyMgn0nUe1nvo0QJswgjQeBUWq_Jf7AlgLNzUE0eacITxZSUkItaG_oHzxMMKiwlayM7rP9ZD451T2RtOm6wi3uALbuyDWSHPeM6174mGHq1dHNN4Qk8-7JkWA8nazSFxjs_m84dIi5pFiT0Hy7Hh06RaKSqqSWZfvgDx');
                    background-size: cover;
                    background-position: center;
                    aspect-ratio: 3/4;">
                </div>
                <div class="mt-2">
                <h6 class="mb-0 text-dark fw-semibold">Orgulho e Preconceito</h6>
                <small class="text-muted">Jane Austen</small>
                </div>
            </div>
            </div>

             <div class="col-6 col-sm-4 col-md-3">
                    <div class="card border-0">
                        <div 
                        class="w-100 rounded overflow-hidden"
                        style="
                        background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBtie8f4-J1ChVp-Givgx2Xm_JUs7v8o791M0aQzrbaF0KapnOHELHnfwdHVIIvrN9yqAjMnJaaTQO1i55xpxKhsjhOkerokVS5KFMOtM6GfEnNwgm5wuv5kylw7lcHfLbxdaYJn6OEgKEWLej98E5Nc-yyP2ncET5g1TxghVSOmWcOv0xduEhqwsTs3jHmwLjAUqESVL1yMSfr0eyd-8sddwM8AQA4gJxRUMl9amBaUH8w4hdqFXnDcfGTdgsB2ZpdbbeejEGe-DVc');
                        background-size: cover;
                        background-position: center;
                        aspect-ratio: 3/4;">
                        </div>
                    <div class="mt-2">
                        <h6 class="mb-0 text-dark fw-semibold">O Sol é para todos</h6>
                        <small class="text-muted">Harper Lee</small>
                    </div>
                </div>
            </div>

                <!-- Livro 4 -->
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card border-0">
                    <div 
                        class="w-100 rounded overflow-hidden"
                        style="
                        background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD3PDqnhoJkJOsnNbB5WR8-ej-lt_u-l6gZ1Z93_rczgixJlvTuVvTxtDtgQjLpMVuUs6y9nhEL74491XoXwT661Ecy0rOKaHWhxhAZDzqF9SpL9Tn0R6Ooq9J4BWMknMZK4mKTYLifEIK1LUzsA60TiR-CbMd0SxV6anEQwVYxJwhtVy1BtNF6jK96rjAIFNIpVnSeW3afElUPnwlJ1fzhejvpt_iw_HLo2uBVLh06L6ntJ1PNL33rvZIP__-mJmVbL53qujtUfGDA');
                        background-size: cover;
                        background-position: center;
                        aspect-ratio: 3/4;">
                    </div>
                    <div class="mt-2">
                        <h6 class="mb-0 text-dark fw-semibold">1984</h6>
                        <small class="text-muted">George Orwell</small>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
                <div class="card border-0">
                    <div
                    class="w-100 rounded overflow-hidden"
                    style="
                        background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDbtKniFE4U9TJulcyHT34tdXMP0EQiTDfSne-5d3Df5bUub3cjTGz08jsogr7l4V0LHnBeBGysIAmc6h1Ee8HgUjnz3EdrJJt2HW6qF7G3caS_3fKDw6SRIHEcbeuxoOiW7FVwPAbMSIeOX_hD7EG_fQu4VRP77D2bEssiNdQCJmhcXLl5es0pY91BRspGPJ_jo1Xya5zLh65MkdUwgt4TUvuAOCPc6o-OZPB79mR5isvVGdU4z15g3vnKFr2Qnkt79ot4yfa-tYa-');
                        background-size: cover;
                        background-position: center;
                        aspect-ratio: 3/4;">
                    </div>
                    <div class="mt-2">
                    <h6 class="mb-0 text-dark fw-semibold">O Grande Gatsby</h6>
                    <small class="text-muted">F. Scott Fitzgerald</small>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
                <div class="card border-0">
                    <div
                    class="w-100 rounded overflow-hidden"
                    style="
                        background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBNf1T-YE4eFctPt1Bhh97p3C4sfx6WDt545Fek-YAmGWwiqkHPzgD2GI2ASWsHZslG7MAWT6pU0l-GJxkNBeZ4Kx6eXeHNWuAeR28c2LPvhNqB_3kdXWVauKfgY4Nm-UUvRr8qIIjkxD47kWyMlqaJkhHy4LWprFXIDc7iMxx6qIQlRoDMwLUIhBgEVVzH3ucsQXFd9EgcgzNGBYazn3WoH-5Lu8m-gUaun1ppdiUMtSUPirzwyL-JwGELjB1LHqab4_FRK3ocOgdG');
                        background-size: cover;
                        background-position: center;
                        aspect-ratio: 3/4;">
                    </div>
                    <div class="mt-2">
                    <h6 class="mb-0 text-dark fw-semibold">Moby Dick</h6>
                    <small class="text-muted">Herman Melville</small>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
                <div class="card border-0">
                    <div
                    class="w-100 rounded overflow-hidden"
                    style="
                        background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBFqLXXDf927fOIlxg3dC0jMlMsTmr7AhP09vA-uasFUIyH9YYTYUBQpIV4HVoUieb2Mup8Xa8O9OGyQiF03CjCTi_fbTndtxPGquWiBIFBBuWx-ZzoZrCzMwMaxPyBDcC2cOL_qMKzh05HZU9SHskUAGl1610y7PTL1ibLCvdK6UzmQRegxSDuY0twLngm3G-8Yvxywg35kQLQnawkyhWMOZUjWMTfNt7jZ7kvFhJxKUf483MS4KSej19oUSu6Xov-zAqfe6MeMbnZ');
                        background-size: cover;
                        background-position: center;
                        aspect-ratio: 3/4;">
                    </div>
                    <div class="mt-2">
                    <h6 class="mb-0 text-dark fw-semibold">Guerra e Paz</h6>
                    <small class="text-muted">Leo Tolstoy</small>
                    </div>
                </div>
            </div>

             <div class="col-6 col-sm-4 col-md-3">
                <div class="card border-0">
                    <div
                    class="w-100 rounded overflow-hidden"
                    style="
                        background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD7-7SVkWWuIcJYTlgsybyqNYvoaNvSRCgqgAi_EIo7JgrsGlxNDm06bsuyR_gyPCW2f_G9mCJ-3hxyqHmekFthJNFIVM2RECBXX2mBAcfmLgUrCXqaEjPXUjORrErA86JCeL2k1vOhBo8PsNZew_t6_wWgid3bCuiYC_SR4OVD19R97nErOAw03oH4IE4R4-6EhohvD3tQCYEeo45iXu8IeUobfW1GtgTkejgC5XWsnyK6x5baP079J_aPfR2czQRZ_o1KYistnhhG');
                        background-size: cover;
                        background-position: center;
                        aspect-ratio: 3/4;">
                    </div>
                    <div class="mt-2">
                    <h6 class="mb-0 text-dark fw-semibold">O Apanhador no Campo de Centeio</h6>
                    <small class="text-muted">J.D. Salinger</small>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
                <div class="card border-0">
                    <div
                    class="w-100 rounded overflow-hidden"
                    style="
                        background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDPKVoKT9UtuaqJOZjtEpuQ4t-wO-j8-aOlAPmIystbuxOEAYs6DxVlfIKkptmOD8MCl7Im9i5Lqj9oBViUt3FyeqHwBBdz_GDrTC7Eco0reLXu3QwsbH-niLDIymx2Ni8w-XpRntmFjPb-jQxGi6W8C1o-_JhjTbZdTBL86ZI4fSINWY2bjhkPkh7BtkXg-auuQQKBXasE7RgmAwjSdYy8lrNULExmceP7vI8Jug1sE__niElbMIoDirpj3Pvry4TIQ9WWssl6CL3E');
                        background-size: cover;
                        background-position: center;
                        aspect-ratio: 3/4;">
                    </div>
                    <div class="mt-2">
                    <h6 class="mb-0 text-dark fw-semibold">A Odisseia</h6>
                    <small class="text-muted">Homer</small>
                    </div>
                </div>
            </div>

                
            <div class="col-6 col-sm-4 col-md-3">
                <div class="card border-0">
                    <div
                    class="w-100 rounded overflow-hidden"
                    style="
                        background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuADC1ZhHnItLVkxnR5dKbuyCb-86ugjU89sdvZVHdTy5Wl4DD9xZHNUFjXTlDI4QOPXkQ6TER19hlVxncuzD8C7V4JcQha-XiEIh5Rlh2goFmiPDgEddhmdMPJpJh3YbFWzN0WGofhKnBfSF4yDviEfEzFaYfUOnXtYCJlbG_YL19-GKdmltuG5zXq8G_a3y52TjNt1Ag9u3OBgNZgW_vmn69CcvPhwhm7cn-_zxmKrF8KobVvn6xD6DyFHPzqgHy26mVlKaLQHFIe-');
                        background-size: cover;
                        background-position: center;
                        aspect-ratio: 3/4;">
                    </div>
                    <div class="mt-2">
                    <h6 class="mb-0 text-dark fw-semibold">Crime e Castigo</h6>
                    <small class="text-muted">Fyodor Dostoevsky</small>
                    </div>
                </div>
            </div>

        </div>
      </main>

      <!-- Footer -->
      <footer class="bg-light py-4 mt-auto text-center">
        <div class="d-flex flex-wrap justify-content-center gap-3 mb-2">
          <a href="#" class="text-muted text-decoration-none">Sobre nós</a>
          <a href="#" class="text-muted text-decoration-none">Contacto</a>
          <a href="#" class="text-muted text-decoration-none">Politicas de Privacidade</a>
          <a href="#" class="text-muted text-decoration-none">Termos de Service</a>
        </div>
        <small class="text-muted">&copy; 2024 Biblioteca Online. Todos os direitos reservados.</small>
      </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

@endsection