<?php

namespace App\Policies;

use App\Model\admin\blog;
use App\Model\user\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the technician.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\Model\admin\blog $blog
     * @return mixed
     */
    public function update(User $user, blog $blog)
    {
        return auth()->user()->id === $blog->user_id;
    }
}
