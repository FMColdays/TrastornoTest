<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstudianteRequest extends FormRequest
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
            'nombre' =>  ['required', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'],
            'numeroControl' =>  ['required', 'regex:/^\d{8}$/', 'unique:estudiantes,numeroControl'],
            'correo' => ['required', 'email', 'unique:estudiantes,correo'],
            'contraseña' => ['required'],
            'instituto_id' => 'required',
            'carrera_id' => 'required',
            'semestre_id' => 'required',
            'edad' => ['required', 'regex:/^\d+$/'],
            'sexo' => 'required',
        ];
    }

    public function messages(): array
    {
        return [

            'nombre.required' => 'El nombre es requerido',
            'nombre.regex' => 'Ingrese un nombre valido',

            'numeroControl.required' => 'El numero de control es requerido',
            'numeroControl.unique' => 'Este número de control ya está registrado',
            'numeroControl.regex' => 'Ingrese un numero de control valido',

            'correo.required' => 'El correo institucional es requerido',
            'correo.unique' => 'Este correo institucional ya está registrado',
            'correo.email' => 'Ingrese un correo valido',

            'contraseña.required' => 'La contraseña es requerida',
            
            'carrera_id.required' => 'La carrera es requerida',

            'edad.required' => 'La edad es requerida',
            'edad.regex' => 'Ingrese una edad valida',
        ];
    }
}
