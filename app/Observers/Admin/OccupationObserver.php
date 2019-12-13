<?php

namespace App\Observers\Admin;

use App\Model\admin\occupation;
use Illuminate\Support\Facades\Cache;

class OccupationObserver
{
    /**
     * Handle the occupation "created" event.
     *
     * @param occupation $occupation
     * @return void
     */
    public function created(occupation $occupation)
    {
        $this->clearCache();
    }

    /**
     * Handle the occupation "updated" event.
     *
     * @param occupation $occupation
     * @return void
     */
    public function updated(occupation $occupation)
    {
        $this->clearCache();
    }

    /**
     * Handle the occupation "deleted" event.
     *
     * @param occupation $occupation
     * @return void
     */
    public function deleted(occupation $occupation)
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
        Cache::forget('occupations');
    }
}
