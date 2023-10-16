<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarreraStoreRequest extends FormRequest
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
            'modalidad' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [

            'nombre.required' => 'El nombre de la carrera es requerido',
            'modalidad.required' => 'Al menos una modalidad es requerida',
        ];
    }
}
