<?php

namespace App\Policies;

use App\User;
use App\Message;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Message $message) {
        return $user->groups()->where('id', $message->group_id)->count() > 0;
    }
}
