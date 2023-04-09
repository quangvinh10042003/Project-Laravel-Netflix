<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;
use App\Policies\RolePolicy;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }
    public function isAdmin(User $user)
    {
        return $user->id ? true : false;
    }

    // public function isProductManager(User $user)
    // {
    //     return $user->id == 3 ? true : false;
    // }

    // public function isTimeManager(User $user)
    // {
    //     return $user->id == 2 ? true : false;
    // }
}
