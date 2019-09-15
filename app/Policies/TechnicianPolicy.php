<?php

namespace App\Policies;

use App\Model\user\User;
use App\Model\user\technician;
use Illuminate\Auth\Access\HandlesAuthorization;

class TechnicianPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the technician.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\Model\user\technician  $technician
     * @return mixed
     */
    public function update(User $user, technician $technician)
    {
        return auth()->user()->id === $technician->user_id;
    }

}
