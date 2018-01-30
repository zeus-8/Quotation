<?php

namespace hive\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
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
            'ref' => 'required|exists:references,id',
            'tipo_hotel' => 'required|exists:thotels,id',
            'nombre' => 'required|string|max:50|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i', 
            'direccion' => 'required|string|max:50|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i', 
            'celular' => 'required|numeric', 
            'contacto' => 'required|string|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i', 
        ];
    }
}
