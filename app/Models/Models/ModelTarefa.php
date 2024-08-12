<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTarefa extends Model{

    use HasFactory;
    protected $fillable=['tarefa_titulo','tarefa_descricao','tarefa_local','tarefa_num_participantes'];
    protected $table='tarefa';

}