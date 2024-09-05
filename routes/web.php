<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::resource('/', UserController::class);
Route::resource('/index', UserController::class);

Route::get('/gerar-pdf/{id}', [UserController::class, 'gerarPDF']);
Route::post('/search', [UserController::class, 'search']);
Route::post('/cadastrar', [UserController::class, 'cadastrar']);
Route::post('/destroy/{id}', [UserController::class, 'destroy']);