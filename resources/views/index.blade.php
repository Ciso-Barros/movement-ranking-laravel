@extends('templates.header')
{{--@dd($tarefa);--}}
@section('content')
<!-- Modal -->
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <!--<h5 class="modal-title" id="exampleModalLabel">Detalhes da Tarefa</h5>-->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
        </div>
    </div>
     @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-4 mb-4" role="alert">
            <strong>Erro!</strong> 
            <ul class="mb-0">
                <li>{{ session('error') }}</li>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container mt-8">
        @csrf
        <table class="table table-hover  text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Local</th>
                    <th scope="col">N° Parcitipantes</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($tarefa_id))
                    <tr>
                        <th scope="row">{{ $tarefa_id->id }}</th>
                        <td>{{ $tarefa_id->tarefa_titulo }}</td>
                        <td>{{ $tarefa_id->tarefa_descricao }}</td>
                        <td>{{ $tarefa_id->tarefa_local }}</td>
                        <td>{{ $tarefa_id->tarefa_num_participantes }}</td>
                        <td>{{ $tarefa_id->created_at }}</td>
                        <td class="text-center">
                    <!-- Menu Dropdown -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Ações
                                </button>
                                <ul class="dropdown-menu">
                            <!-- Visualizar -->
                                    <li>
                                        <a id="{{ $tarefa_id->id }}" class="btn dropdown-item ver-dados" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="bi bi-eye me-2"></i>
                                    Visualizar
                                        </a>
                                    </li>
                            <!-- Editar -->
                                    <li>
                                        <a class="dropdown-item" href="{{ url('tarefa/' . $tarefa_id->id . '/edit') }}">
                                            <i class="bi bi-pencil me-2"></i>
                                    Editar
                                        </a>
                                    </li>
                            <!-- Deletar -->
                                    <li>
                                        <form action="{{ route('tarefa.destroy', $tarefa_id->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bi bi-trash me-2"></i>
                                        Deletar
                                            </button>
                                        </form>
                                    </li>
                            <!-- Gerar PDF -->
                                    <li>
                                        <form action="{{ url('/gerar-pdf', $tarefa_id->id) }}" method="GET" style="display:inline;">
                                            <button type="submit" class="dropdown-item text-info">
                                                <i class="bi bi-file-earmark-pdf me-2"></i>
                                        PDF
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @else
                @foreach($tarefa as $dados)
                        <tr>
                            <th scope="row">{{ $dados->id }}</th>
                            <td>{{ $dados->tarefa_titulo }}</td>
                            <td>{{ $dados->tarefa_descricao }}</td>
                            <td>{{ $dados->tarefa_local }}</td>
                            <td>{{ $dados->tarefa_num_participantes }}</td>
                            <td>{{ $dados->created_at }}</td>
                            <td class="text-center">
                    <!-- Menu Dropdown -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Ações
                                    </button>
                                    <ul class="dropdown-menu">
                            <!-- Visualizar -->
                                        <li>
                                            <a id="{{ $dados->id }}" class="btn dropdown-item ver-dados" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="bi bi-eye me-2"></i>
                                    Visualizar
                                            </a>
                                        </li>
                            <!-- Editar -->
                                        <li>
                                            <a class="dropdown-item" href="{{ url('tarefa/' . $dados->id . '/edit') }}">
                                                <i class="bi bi-pencil me-2"></i>
                                    Editar
                                            </a>
                                        </li>
                            <!-- Deletar -->
                                        <li>
                                            <form action="{{ route('tarefa.destroy', $dados->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger">
                                                    <i class="bi bi-trash me-2"></i>
                                        Deletar
                                                </button>
                                            </form>
                                        </li>
                            <!-- Gerar PDF -->
                                        <li>
                                            <form action="{{ url('/gerar-pdf', $dados->id) }}" method="GET" style="display:inline;">
                                                <button type="submit" class="dropdown-item text-info">
                                                    <i class="bi bi-file-earmark-pdf me-2"></i>
                                        PDF
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection

