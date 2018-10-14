<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateNote
 * @package App\Http\Requests
 */
class UpdateNote extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'sometimes|required',
        ];
    }
}
