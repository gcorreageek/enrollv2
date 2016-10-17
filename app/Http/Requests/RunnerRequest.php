<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RunnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'track' => 'required',
            'name_last' => 'required',
            'name_first' => 'required',
            'mail' => 'required|email|confirmed',
            'telephone' => 'required',
            'country' => 'required',
            'state' => 'required_if:country,pe',
            'province' => 'required_if:state,LIM',
            'city' => 'required_if:province,LIM',
            'blood' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'track.required' => 'Debe seleccionar una distancia',
            'name_last.required' => 'Debe ingresar su(s) apellido(s)',
            'name_first.required' => 'Debe ingresar su(s) nombre(s)',
            'mail.required' => 'Debe ingresar un correo electrónico',
            'mail.email' => 'Ingrese un correo electrónico válido',
            'mail.confirmed' => 'El correo electrónico no coincide',
            'telephone.required' => 'Debe ingresar un teléfono',
            'country.required' => 'Debe seleccionar un país',
            'state.required_if' => 'Debe seleccionar un departamento',
            'province.required_if' => 'Debe seleccionar una provincia',
            'city.required_if' => 'Debe seleccionar un distrito',
            'blood.required' => 'Debe seleccionar su grupo sanguíneo',

        ];
    }
}
