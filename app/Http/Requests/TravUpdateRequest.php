<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravUpdateRequest extends FormRequest
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
        //dd($this->viaje);
        return [
            'mt'               => 'required|unique:travels,mt,' .$this->viaje,
            'name'             => 'required',
            'airline'          => 'required',
            'countri'          => 'required',
            'cities'           => 'required',
            'video'            => 'required',
            'days'             => 'required',
            'nights'           => 'required',
            'price_from'       => 'required',
            'taxes'            => 'required',
            'validity'         => 'required',
            'departure_date'   => 'required',
            'include'          => 'required',
            'not_include'      => 'required',
            'itinerary'        => 'required',
            'price_table'      => 'required',

        ];
    }
}
