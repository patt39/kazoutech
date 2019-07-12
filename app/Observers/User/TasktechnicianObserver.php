<?php

namespace App\Observers\User;

use App\Model\user\tasktechnician;
use Illuminate\Support\Facades\Cache;

class TasktechnicianObserver
{
    /**
     * Handle the tasktechnician "created" event.
     *
     * @param  \App\Model\user\tasktechnician  $tasktechnician
     * @return void
     */
    public function created(tasktechnician $tasktechnician)
    {
        $this->clearCache();
    }

    /**
     * Handle the tasktechnician "updated" event.
     *
     * @param  \App\Model\user\tasktechnician  $tasktechnician
     * @return void
     */
    public function updated(tasktechnician $tasktechnician)
    {
        $this->clearCache();
    }

    /**
     * Handle the tasktechnician "deleted" event.
     *
     * @param  \App\Model\user\tasktechnician  $tasktechnician
     * @return void
     */
    public function deleted(tasktechnician $tasktechnician)
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
        Cache::forget('tasktechnicians');
    }
}
