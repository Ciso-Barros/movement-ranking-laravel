@extends('templates.header')
@section('content')
{{--@dd($tarefa);--}}
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <h4 class="alert-heading"> Segurança Ativada!</h4>
  <p>Esta API Implementa e valida as entradas via <b>back-end</b></p>
  <hr>
  <p class="mb-0"> <b>>></b> Experimente retirar o atributo html "Required"</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <h1 class="text-center">Cadastrar</h1> 
    <hr>
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
            <form name="formCad" id="formCad" method="post" action="{{ url('/cadastrar') }}">
                @csrf
                <input class="form-control" type="text" name="user_name" id="titulo" placeholder="Nome:" value="" required><br>
                <textarea class="form-control" rows="4" name="movement_name" id="descricao" placeholder="Movimento:" required></textarea><br>
                <div class="form-check form-switch">
                    <label class="form-check-label" for="toggleCounter">Adicionar Pontuação?</label>
                    <input class="form-check-input" type="checkbox" id="toggleCounter">
                </div>
                <div id="counterContainer" class="d-none">
                    <div class="input-group">
                        <button class="btn btn-outline-primary" type="button" id="decreaseButton">-</button>
                        <input type="text" class="form-control text-center" name="score" id="counter" value="" readonly>
                        <button class="btn btn-outline-primary" type="button" id="increaseButton">+</button>
                    </div>
                </div>
                <br>
                <input class="btn btn-primary" type="submit" value="Cadastrar">
            </form>
        </div>
    @endsection
