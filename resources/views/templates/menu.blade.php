
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand">Plano de Férias - "Vacation Plan in Portuguese" </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/create')}}">
                        <button class="btn btn-success">Cadastrar</button>
                    </a>
                </li>
            </ul>
             <form class="d-flex" action="{{ url('/search') }}" method="POST">
                @csrf
                <input class="form-control me-2" name="id" type="text" placeholder="Consulta pelo ID" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
        </div>
    </div>
</nav>