@extends('templates/livros_layout')
@section('content')
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
                <div class="w-100 rounded overflow-hidden"
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAW9scT88nfg7tPfVGMU-m969uys-zf62Ec1KYzN6juEJSaMDy5WK6s7kChooh4jGpGLqz1TA4COuDVde4bUht6xkEbHspkXS4FLJ-2M75cTksUhahANF4FtRekldy0tFo4xP2kDvBJJPcu6vSoDv5U8Ek_M9A2uOyUzQSXhUX1MguZm1eOIuM9Ic0KM7ZtoQIBVgM0NDUEyzbm_cU2ZV8d-o_jEo8PY6b_uANdbLYED2A7J7md7OAIFmLTbdfq7uv8B4PBApUPXjB9'); 
                        background-size: cover; 
                        background-position: center; 
                        aspect-ratio: 3/4;">
                </div>

                <div class="mt-2">
                    <h6 class="mb-0 text-dark fw-semibold">{{ $material->titulo }}</h6>
                    <h6 class="mb-0 text-dark fw-semibold">{{ $material->status_material }}</h6>
                    <small class="text-muted">Frances Hodgson Burnett</small><br>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3">
            <div class="card border-0">
                <div class="w-100 rounded overflow-hidden"
                    style="
                    background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCR2H3ygE29USMyKJ7u9iIYhLaljmk-MQ7qPel2odmhR-7P-kmJOgAqS_G0pNAV4PxLgeQca8cEMFuMiIzEPZC1H-UeOWf8VcnkgrAsYWGLyMgn0nUe1nvo0QJswgjQeBUWq_Jf7AlgLNzUE0eacITxZSUkItaG_oHzxMMKiwlayM7rP9ZD451T2RtOm6wi3uALbuyDWSHPeM6174mGHq1dHNN4Qk8-7JkWA8nazSFxjs_m84dIi5pFiT0Hy7Hh06RaKSqqSWZfvgDx');
                    background-size: cover;
                    background-position: center;
                    aspect-ratio: 3/4;">
                </div>
                <div class="mt-2">
                    <h6 class="mb-0 text-dark fw-semibold">Orgulho e Preconceito</h6>
                    <small class="text-muted">Jane Austen</small>
                    <a href="#" class="btn btn-primary">Visualizar livro</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3">
            <div class="card border-0">
                <div class="w-100 rounded overflow-hidden"
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
                <div class="w-100 rounded overflow-hidden"
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
                <div class="w-100 rounded overflow-hidden"
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
                <div class="w-100 rounded overflow-hidden"
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
                <div class="w-100 rounded overflow-hidden"
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
                <div class="w-100 rounded overflow-hidden"
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
                <div class="w-100 rounded overflow-hidden"
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
                <div class="w-100 rounded overflow-hidden"
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

    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
@endsection
