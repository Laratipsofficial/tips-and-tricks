<?php

namespace App\Exceptions;

use App\Models\User;
use Exception;

class InvalidUserException extends Exception
{
    private User $user;

    public function __construct(User $user)
    {
        parent::__construct();

        $this->user = $user;
    }

    public function context()
    {
        return ['user_id' => $this->user->id];
    }
}
