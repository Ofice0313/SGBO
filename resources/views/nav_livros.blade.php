
<header class="border-bottom border-light py-3 px-4 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center gap-4">
        <div class="d-flex align-items-center gap-2">
        <svg width="32" height="32" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
    
        </svg>
        <h2 class="h5 fw-bold mb-0 text-dark">Bibliotecca Online</h2>
        </div>
        <nav class="d-flex gap-4">
        <a href="" class="text-decoration-none fw-medium text-dark">Início</a>
        <a href="{{ route('books') }}" class="text-decoration-none fw-medium text-dark">Livro</a>
        <form action="{{ route('books') }}" method="GET" class="d-flex align-items-center ms-3">
            <input type="text" name="q" class="form-control form-control-sm me-2" placeholder="Pesquisar por título, autor, categoria ou subcategoria">
            <button type="submit" class="btn btn-outline-primary btn-sm">Buscar</button>
        </form>
        </nav>
    </div>

        <div class="d-flex align-items-center gap-3">
          

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