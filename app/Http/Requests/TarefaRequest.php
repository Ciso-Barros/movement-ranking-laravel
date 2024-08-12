<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaRequest extends FormRequest {

    public function authorize() {
        return true;
    }
    
    public function rules() {
        return [
            'tarefa_titulo' => 'required',
            'tarefa_descricao' => 'required',
            'tarefa_local' => 'required',
//            'tarefa_num_participantes' => 'required|numeric'
        ];
    }

    public function messages() {
        return [
            'tarefa_titulo.required' => 'Coloque o título!',
            'tarefa_descricao.required' => 'Descreve a tarefa!',
            'tarefa_local.required' => 'Defina um local!',
        ];
    }
}
