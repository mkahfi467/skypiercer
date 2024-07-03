<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function isStaffOrOwner(User $user)
    {
        return in_array($user->role, ['staff', 'owner']);
    }

    public function isBuyer(User $user)
    {
        return $user->role === 'pembeli';
    }
}
