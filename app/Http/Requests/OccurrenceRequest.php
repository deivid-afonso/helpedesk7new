<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OccurrenceRequest extends FormRequest
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
             'occurrence_type_id' => ['required'],
             'device_id' => ['required'],

        ];
    }
    public function messages()
    {
        return[

            'required' => 'Campo obrigatório',


        ];
    }
}
