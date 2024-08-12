@extends('templates.header')
@section('content')
{{--@dd($tarefa);--}}
    <h1 class="text-center">@if(isset($tarefa)) Editar @else Cadastrar @endif</h1> <hr>
    <div class="col-8 m-auto">

        @if(isset($errors) && count($errors) > 0)
            <div class="alert alert-danger alert-dismissible fade show mt-4 mb-4" role="alert">
                <strong>Erro!</strong> 
                <ul class="mb-0">
                    @foreach($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(isset($tarefa))
            <form name="formEdit" id="formEdit" method="post" action="{{ url('tarefa/{$tarefa->id}') }}">
                @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="{{ url('/tarefa') }}">
        @endif
                @csrf
                <input class="form-control" type="text" name="tarefa_titulo" id="titulo" placeholder="Título:" value="{{ $tarefa->tarefa_titulo ?? '' }}" required><br>
                <textarea class="form-control" rows="4" name="tarefa_descricao" id="descricao" placeholder="Descrição:" required>{{ $tarefa->tarefa_descricao ?? '' }}</textarea><br>
                <input class="form-control" type="text" name="tarefa_local" id="local" placeholder="Local:" value="{{ $tarefa->tarefa_local ?? '' }}" required><br>
                <div class="form-check form-switch">
                    <label class="form-check-label" for="toggleCounter">Adicionar Participantes</label>
                    <input class="form-check-input" type="checkbox" id="toggleCounter" {{ isset($tarefa->tarefa_num_participantes) ? 'checked' : '' }}>
                </div>
                <div id="counterContainer" class="{{ !isset($tarefa->tarefa_num_participantes) ? 'd-none' : '' }}">
                    <div class="input-group">
                        <button class="btn btn-outline-primary" type="button" id="decreaseButton">-</button>
                        <input type="text" class="form-control text-center" name="tarefa_num_participantes" id="counter" value="{{ $tarefa->tarefa_num_participantes ?? '0' }}" readonly>
                        <button class="btn btn-outline-primary" type="button" id="increaseButton">+</button>
                    </div>
                </div>
                <br>
                <input class="btn btn-primary" type="submit" value="@if(isset($tarefa)) Editar @else Cadastrar @endif">
            </form>
        </div>
    @endsection
