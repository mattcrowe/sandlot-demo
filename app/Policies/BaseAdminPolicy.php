<?php

namespace App\Policies;

use App\Behaviors\NoteableInterface;
use App\User;
use App\Note;
use App\Services\ActiveNoteService;
use App\Services\PermissibleService;
use App\Services\PermissibleServiceTrait;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseAdminPolicy
 * @package App\Policies
 */
class BaseAdminPolicy
{
    use HandlesAuthorization;

    /**
     * @var ActiveNoteService
     */
    public $noteService;

    /**
     * @return ActiveNoteService
     */
    public function noteService()
    {
        return $this->noteService ?: $this->noteService = new ActiveNoteService();
    }

    /**
     * Determine whether the user can view the object.
     *
     * @param  User $auth
     * @param  mixed $arguments
     * @return mixed
     */
    public function view(User $auth, $arguments = null)
    {
        if ($this->ofNote($auth, $arguments)) {
            return true;
        }
    }

    /**
     * Determine whether the user can create object.
     *
     * @param  User $auth
     * @return mixed
     */
    public function create(User $auth, $arguments = null)
    {

    }

    /**
     * Determine whether the user can update the object.
     *
     * @param  User $auth
     * @param  mixed $arguments
     * @return mixed
     */
    public function update(User $auth, $arguments = null)
    {
        if ($this->ofNote($auth, $arguments)) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the object.
     *
     * @param  User $auth
     * @param  mixed $arguments
     * @return mixed
     */
    public function delete(User $auth, $arguments = null)
    {
        if ($this->ofNote($auth, $arguments)) {
            return true;
        }
    }

    /**
     * Determine if user is of note
     *
     * @param User $auth
     * @param  mixed $arguments
     * @return bool
     */
    public function ofNote(User $auth, $arguments = null, $note = null)
    {

//        $note = $note ?: $this->noteService()->note();
//        if ($note && $arguments instanceof NoteableInterface) {
//            $this->noteService()->user = $auth;
//            if ($this->noteService()->isAuthorized($note->id)) {
//                return true;
//            }
//        }

        if ($arguments instanceof NoteableInterface) {
            $note = $note ?: $arguments->note;
            $this->noteService()->user = $auth;
            if ($note && $this->noteService()->isAuthorized($note->id)) {
                return true;
            }
        }
    }
}
