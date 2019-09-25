<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RevistasStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tipo_revista'   => 'required',
            'descripcion'    => 'required',
            'url'            => 'required',
            'activo'         => 'required',
        ];
    }
}
