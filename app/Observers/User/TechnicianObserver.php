<?php

namespace App\Observers\User;

use App\Model\user\technician;
use Illuminate\Support\Facades\Cache;

class TechnicianObserver
{
    /**
     * Handle the technician "created" event.
     *
     * @param  \App\Model\user\technician  $technician
     * @return void
     */
    public function created(technician $technician)
    {
        $this->clearCache();
    }

    /**
     * Handle the technician "updated" event.
     *
     * @param  \App\Model\user\technician  $technician
     * @return void
     */
    public function updated(technician $technician)
    {
        $this->clearCache();
    }

    /**
     * Handle the technician "deleted" event.
     *
     * @param  \App\Model\user\technician  $technician
     * @return void
     */
    public function deleted(technician $technician)
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
        Cache::forget('technicians');
    }
}
