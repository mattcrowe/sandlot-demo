<?php

namespace App\Observers;

use App, Cookie;
use App\Note;

class NoteObserver
{
    /**
     * Listen to the Model saving $item.
     *
     * @param Note $note
     */
    public function saving(Note $note)
    {
        $note->guid = $note->guid ?: Cookie::get('guid');
        $note->color = $note->color ?: array_keys(config('colors'))[0];
    }

}