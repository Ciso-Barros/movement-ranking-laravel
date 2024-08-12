<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;

Route::resource('/', TarefaController::class);
Route::resource('/tarefa', TarefaController::class);

Route::get('/gerar-pdf/{id}', [TarefaController::class, 'gerarPDF']);
Route::post('/search', [TarefaController::class, 'search']);