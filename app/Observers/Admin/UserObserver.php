<?php

namespace App\Observers\Admin;

use App\Model\user\user;
use Illuminate\Support\Facades\Cache;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param user $user
     * @return void
     */
    public function created(user $user)
    {
         $this->clearCache();
    }

    /**
     * Handle the user "updated" event.
     *
     * @param user $user
     * @return void
     */
    public function updated(user $user)
    {
         $this->clearCache();
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param user $user
     * @return void
     */
    public function deleted(user $user)
    {
         $this->clearCache();
    }
    /**
     * Handle the occupation "clearCache" event.
     *
     * @return void
     */
    protected function clearCache()
    {
        Cache::forget('users');
    }
}
