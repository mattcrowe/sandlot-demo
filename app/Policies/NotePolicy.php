<?php

namespace App\Policies;

use Belt;
use Cookie;
use App\Note;
use App\User;

/**
 * Class NotePolicy
 * @package Belt\Clip\Policies
 */
class NotePolicy extends \App\Policies\BaseAdminPolicy
{

    /**
     * @param Note $note
     * @return bool
     */
    private function guidMatches(Note $note)
    {
        return $note->guid === Cookie::get('guid');
    }

    /**
     * Determine whether the user can view the object.
     *
     * @param  User $auth
     * @param  Note $arguments
     * @return mixed
     */
    public function view(User $auth, $arguments = null)
    {
        if (true === $this->guidMatches($arguments)) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the object.
     *
     * @param  User $auth
     * @param  Note $arguments
     * @return mixed
     */
    public function update(User $auth, $arguments = null)
    {
        if (true === $this->guidMatches($arguments)) {
            return true;
        }
    }
}