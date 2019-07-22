<?php

namespace App\Policies\Partial;

use App\Model\user\User;
use App\Model\user\technician;
use Illuminate\Auth\Access\HandlesAuthorization;

class TechnicianPolicy
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
     * @param  \App\Model\user\technician  $technician
     * @return mixed
     */
    public function view(User $user, technician $technician)
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
     * @param  \App\Model\user\technician  $technician
     * @return mixed
     */
    public function update(User $user, technician $technician)
    {
        return auth()->user()->id === $technician->user_id;
    }

    /**
     * Determine whether the user can delete the technician.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\Model\user\technician  $technician
     * @return mixed
     */
    public function delete(User $user, technician $technician)
    {
        //
    }

    /**
     * Determine whether the user can restore the technician.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\Model\user\technician  $technician
     * @return mixed
     */
    public function restore(User $user, technician $technician)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the technician.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\Model\user\technician  $technician
     * @return mixed
     */
    public function forceDelete(User $user, technician $technician)
    {
        //
    }
}
