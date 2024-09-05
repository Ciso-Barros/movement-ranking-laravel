<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalRecordRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'user_name' => 'required|string|regex:/^[\pL\s]+$/u',
            'movement_name' => 'required|string|regex:/^[\pL\s]+$/u',
        ];
    }

    public function messages() {
    return [
        'user_name.required' => 'O Nome é obrigatório!',
        'user_name.string' => 'O Nome deve ser do tipo texto!',
        'user_name.regex' => 'O Nome deve conter apenas letras e espaços!',
        
        'movement_name.required' => 'O Movimento é obrigatório!',
        'movement_name.string' => 'O Movimento deve ser do tipo texto!',
        'movement_name.regex' => 'O Movimento deve conter apenas letras e espaços!',
    ];
}

}
