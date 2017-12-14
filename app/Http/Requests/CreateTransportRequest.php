<?php

namespace hive\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransportRequest extends FormRequest
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
            'empresa' => 'required|exists:empresa,id',
            'nombre_chofer' => 'required|string|max:50|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i', 
            'apellido_chofer' => 'required|string|max:50|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i', 
            'cedula' => 'required|numeric|min:10|unique:transportes,cedula', 
            'celular' => 'required|numeric', 
            'transporte' => 'required|exists:tipo_trans,id',
            'descripcion' => 'required|min:3'
        ];
    }
}
