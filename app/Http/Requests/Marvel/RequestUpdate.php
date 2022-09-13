<?php

namespace App\Http\Requests\Marvel;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdate extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'       => 'sometimes',
            'description' => 'sometimes',
            'type'        => 'sometimes',
            'series'      => 'sometimes',
            'comics'      => 'sometimes'
        ];
    }
}
