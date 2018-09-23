<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AttachTeamPlayer
 * @package App\Http\Requests
 */
class AttachTeamPlayer extends FormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'player_id' => 'required|exists:players,id',
        ];
    }

}