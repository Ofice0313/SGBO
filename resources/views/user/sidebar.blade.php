<div class="col-12 col-md-3 col-lg-2 bg-light p-4 d-flex flex-column justify-content-between">
    <div>
        <h1 class="fs-5 fw-medium mb-4">Dashboard do Usuário</h1>
        <div class="list-group">

            <a href="#" class="list-group-item list-group-item-action nav-link d-flex align-items-center gap-2"
                data-url="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" class="bi bi-book"
                    viewBox="0 0 16 16">
                    <path
                        d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                </svg>
                Meus Livros
            </a>

            <a href="#" class="list-group-item list-group-item-action nav-link d-flex align-items-center gap-2"
                data-url="{{ route('emprestimos.meus_emprestimos')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor"
                    class="bi bi-bookmark" viewBox="0 0 16 16">
                    <path
                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                </svg>
                Meus Empréstimos
            </a>

            <a href="#" class="list-group-item list-group-item-action nav-link d-flex align-items-center gap-2"
                data-url="{{ route('emprestimos.criar')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor"
                    class="bi bi-bookmark" viewBox="0 0 16 16">
                    <path
                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                </svg>
                Solicitar Empréstimo
            </a>

           <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display:none;">
                @csrf
            </form>

            <a href="#" class="list-group-item list-group-item-action nav-link d-flex align-items-center gap-2"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0..." />
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0..." />
                </svg>
                Sair
            </a>
        </div>
    </div>
</div>
