<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityStoreRequest extends FormRequest
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
          'country_code_iata'  => 'required',
          'name'               => 'required|unique:cities,name,' .$this->city,
          'longitude'          => 'required',
          'latitude'           => 'required',
        ];
    }
}
