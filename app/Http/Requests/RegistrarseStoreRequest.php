<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarseStoreRequest extends FormRequest
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
            'correo' => ['required', 'regex:/^[A-Za-z0-9._%+-]+@tuxtla\.tecnm\.mx$/', 'unique:estudiantes,correo'],
            'contraseña' => ['required', 'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/'],
            'contraseña2' => 'required|same:contraseña',
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
            'correo.regex' => 'Ingrese un correo valido',

            'contraseña.required' => 'La contraseña es requerida',
            'contraseña.regex' => 'Ingrese una contaseña valida',

            'carrera_id.required' => 'La carrera es requerida',

            'contraseña2.required' => 'La validacion de contraseña es requerida',
            'contraseña2.same' => 'Las contraseñas no coinciden.',

            'edad.required' => 'La edad es requerida',
            'edad.regex' => 'Ingrese una edad valida',
        ];
    }
}
