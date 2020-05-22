<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OccurrenceTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => ['required', 'string', 'max:255'],
        ];
    }
    public function messages()
    {
        return[
            'min' => 'Campo deve ter no mínimo :min caracteres',
            'max' => 'Campo deve ter no máximo :max caracteres',
            'required' => 'Campo obrigatório',
           

        ];
    }
}
