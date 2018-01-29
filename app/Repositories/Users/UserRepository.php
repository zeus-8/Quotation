<?php

namespace hive\Repositories\Users;

use hive\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function exampleGetUserConnect()
    {
        if (is_null(Auth::user())) {

            return $this->user->findOrFail(2); // TEST

        } else {

            return Auth::user();
        }
    }
}