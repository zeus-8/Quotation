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
            'cedula' => 'required|numeric|digits_between:10,11|unique:transfers,tr_id_card', 
            'celular' => 'required|numeric', 
            'tipo_transporte' => 'required|exists:ttransfers,id',
            'costo' => 'required|numeric',
            'tipo_servicio' => 'required|max:50|min:4|',
            'cap_max' => 'required|digits_between:1,3',
        ];
    }
}
