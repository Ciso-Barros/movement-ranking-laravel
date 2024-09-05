
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <img src="{{ asset('assets/img/LogoAmarelo.png') }}" alt="Logo" style="max-width: 155px">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/create')}}">
                        <button class="btn btn-warning">
                            <i class="bi bi-pencil me-2"></i>
                            Cadastrar Recorde Pessoal
                        </button>
                    </a>
                </li>
            </ul>
             <form class="d-flex" action="{{ url('/search') }}" method="POST">
                @csrf
                <input class="form-control me-2" name="name_user" type="text" placeholder="Consultar  Nome" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Pesquisar</button>
            </form>
        </div>
    </div>
</nav>