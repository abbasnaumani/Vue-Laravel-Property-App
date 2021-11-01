<?php

namespace App\Traits;

use App\Models\User;

trait UserTrait
{
    public function getAllUsers()
    {
        return User::with('roles')->get();
    }
}
