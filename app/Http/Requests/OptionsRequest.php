<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionsRequest extends FormRequest
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
            'size_id' => 'required',
            'relative_relationship' => 'required',
            'relative_name' => 'required',
            'relative_phone' => 'required',
            'terms_agree' => 'required',
            'privacy_agree' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'size_id.required' => 'Debe seleccionar una talla de polo.',
            'relative_relationship.required' => 'Debe seleccionar un tipo de vínculo.',
            'relative_name.required' => 'Debe ingresar el nombre completo de su contacto de emergencia.',
            'relative_phone.required' => 'Debe ingresar el teléfono de su contacto de emergencia.',
            'terms_agree.required' => 'Debe aceptar los términos y condiciones de participación del evento para continuar',
            'privacy_agree.required' => 'Debe aceptar las políticas de privacidad del evento para continuar',
        ];
    }
}
