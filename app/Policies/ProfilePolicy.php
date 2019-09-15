<?php

namespace App\Policies;

use App\Model\user\profile;
use App\Model\user\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the technician.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\Model\user\profile  $profile
     * @return mixed
     */
    public function update(User $user, profile $profile)
    {
        return auth()->user()->id === $profile->user_id;
    }
}
