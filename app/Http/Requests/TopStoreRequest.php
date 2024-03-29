<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopStoreRequest extends FormRequest
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
          'top_travel_mt'   => 'required',
          'top_travel_code' => 'required',
        ];
    }
}
