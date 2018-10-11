<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreNote
 * @package App\Http\Requests
 */
class StoreNote extends FormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:notes,name',
        ];
    }

}