<?php

namespace hive\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGuideRequest extends FormRequest
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
            'nombre' => 'required|string|max:50|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i', 
            'apellido' => 'required|string|max:50|min:4|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\.\- ]+$/i', 
            'celular' => 'required|numeric', 
            'email' => 'required|unique:guides,gu_email',
            'costo' => 'required|numeric', 
        ];
    }
}
