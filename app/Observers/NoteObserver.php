<?php

namespace App\Observers;

use Belt, Cookie;
use App\Note;

class NoteObserver
{
    /**
     * Listen to the Model creating $item.
     *
     * @param Note $note
     */
    public function creating(Note $note)
    {
        $note->token = str_random(16);
    }

    /**
     * Listen to the Model saving $item.
     *
     * @param Note $note
     */
    public function saving(Note $note)
    {
        $note->guid = $note->guid ?: Cookie::get('guid');
    }

}