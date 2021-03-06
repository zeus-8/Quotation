<?php

namespace hive\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransferRequest extends FormRequest
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
            'empresa' => 'required|exists:companies,id',
            'nombre_chofer' => 'required|string|max:50|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i', 
            'apellido_chofer' => 'required|string|max:50|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i', 
            'cedula' => 'required|numeric|digits_between:10,11|unique:transfers,tr_id_card', 
            'celular' => 'required|numeric', 
            'costo' => 'required|numeric',
            'tipo_transporte' => 'required|exists:ttransfers,id',
            'descripcion' => 'required|min:3'
        ];
    }
}
