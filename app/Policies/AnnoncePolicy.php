<?php

namespace App\Policies;

use App\Model\admin\annonce;
use App\Model\user\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnnoncePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the technician.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\Model\admin\annonce $annonce
     * @return mixed
     */
    public function update(User $user, annonce $annonce)
    {
        return auth()->user()->id === $annonce->user_id;
    }
}
