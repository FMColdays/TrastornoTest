<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' =>  ['required'],
            'descripcion' => ['required'],
            'resultado1' => ['required'],
            'valorRes1' => ['required'],
            'resultado2' => ['required'],
            'valorRes2' => ['required'],
            'resultado3' => ['required'],
            'valorRes3' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del test es requerido',
            'descripcion.required' => 'La descripción del test es requerida',
            'resultado1' => 'Este campo es requerido',
            'valorRes1' => 'Este campo es requerido',
            'resultado2' => 'Este campo es requerido',
            'valorRes2' => 'Este campo es requerido',
            'resultado3' => 'Este campo es requerido',
            'valorRes3' => 'Este campo es requerido',
        ];
    }
}
