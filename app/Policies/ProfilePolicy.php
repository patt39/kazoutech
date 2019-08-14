<?php

namespace App\Policies;

use App\Model\user\profile;
use App\Model\user\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any technicians.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the technician.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\Model\user\profile  $profile
     * @return mixed
     */
    public function view(User $user, profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can create technicians.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

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
