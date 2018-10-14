<?php

namespace App\Policies;

use Cookie;
use App\User;
use App\Note;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    /**
     * @param Note $note
     * @return bool
     */
    private function guidMatches(Note $note)
    {
        return $note->guid === Cookie::get('guid');
    }

    /**
     * Determine whether the user can view the note.
     *
     * @param  \App\User  $user
     * @param  \App\Note  $note
     * @return mixed
     */
    public function view(User $user = null, Note $note)
    {
        if (true === $this->guidMatches($note)) {
            return true;
        }
    }

    /**
     * Determine whether the user can create notes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user = null)
    {
        return true;
    }

    /**
     * Determine whether the user can update the note.
     *
     * @param  \App\User  $user
     * @param  \App\Note  $note
     * @return mixed
     */
    public function update(User $user = null, Note $note)
    {
        if (true === $this->guidMatches($note)) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the note.
     *
     * @param  \App\User  $user
     * @param  \App\Note  $note
     * @return mixed
     */
    public function delete(User $user = null, Note $note)
    {
        if (true === $this->guidMatches($note)) {
            return true;
        }
    }
}
