<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GatewayRequest extends FormRequest
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
            'doc_type'      =>  'required',
            'doc_num'       =>  'required|string|min:5',
            'gender'        =>  'required',
            'dob'           =>  'required|date',
            'pay'           =>  'required',
            'gateway'       =>  'required_if:pay,gateway',
            'code'          =>  'required_if:pay,code|min:8'
        ];
    }


    public function messages()
    {
        return [
            'doc_type.required'         =>  'Seleccione un tipo de documento',
            'doc_num.required'          =>  'Ingrese un número de documento',
            'doc_num.min'               =>  'El número de documento debe tener como mínimo 5 caracteres',
            'gender.required'           =>  'Seleccione un género para continuar',
            'dob.required'              =>  'Ingrese una fecha válida',
            'dob.date'                  =>  'Ingrese una fecha válida',
            'pay.required'              =>  'Seleccione un medio de pago',
            'gateway.required_if'       =>  'Seleccione un medio de pago',
            'code.required_if'          =>  'Ingrese un código de subscripción',
            'code.size'                 =>  'El código de subscripción debe tener por lo menos 8 caracteres'
        ];
    }
}
