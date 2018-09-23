<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreTeam
 * @package Belt\Core\Http\Requests
 */
class StoreTeam extends FormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:teams,name',
        ];
    }

}