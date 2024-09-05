@extends('templates.header')
{{--@dd($records);--}}
@section('content')
    {{--@dd(session('error'));--}}
     @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-4 mb-4" role="alert">
            <strong>Erro!</strong> 
            <ul class="mb-0">
                <li>{{ session('error') }}</li>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
     @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4 mb-4" role="alert">
            <strong>Parabéns!</strong> 
            <ul class="mb-0">
                <li>{{ session('success') }}</li>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container mt-8">
        @csrf
        <h2>Ranking de Movimentos</h2>
        <table class="table table-hover  text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Ranking</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Movimento</th>
                    <th scope="col">Pontuação</th>
                    <th scope="col">Data</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                @php
        $movementName = null;
    @endphp
                @foreach($records as $dados)
        @if ($dados->movement_name !== $movementName)
                        <tr class='active'> 
                            <td colspan="5" style="border-top: 2px solid black; font-weight: bold;">
                                Movimento: {{ $dados->movement_name }}
                            </td>
                        </tr>
                        @php
                $movementName = $dados->movement_name;
            @endphp
                    @endif


                    <tr>
                        <td>{{ $dados->rank }}°</td>
                        <td>{{ $dados->user_name ? $dados->user_name : 'Desconhecido' }} </td>
                        <td>{{ $dados->movement_name ? $dados->movement_name : 'Desconhecido' }}</td>
                        <td>{{ $dados->score }}</td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($dados->date)) }}</td>
                        <td>
                            <form  action="{{ url('destroy', $dados->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                @csrf
                                {{--@method('DELETE')--}}
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-person-x-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>


        </table>
    </div>
@endsection

