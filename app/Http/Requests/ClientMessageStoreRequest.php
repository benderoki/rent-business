<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientMessageStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message' => [
                'string',
                'required',
                'max:255',
            ],
        ];
    }
}
