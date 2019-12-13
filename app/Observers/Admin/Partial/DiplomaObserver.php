<?php

namespace App\Observers\Admin\Partial;

use App\Model\admin\partial\diploma;
use Illuminate\Support\Facades\Cache;

class DiplomaObserver
{
    /**
     * Handle the diploma "created" event.
     *
     * @param diploma $diploma
     * @return void
     */
    public function created(diploma $diploma)
    {
        $this->clearCache();
    }

    /**
     * Handle the diploma "updated" event.
     *
     * @param diploma $diploma
     * @return void
     */
    public function updated(diploma $diploma)
    {
        $this->clearCache();
    }

    /**
     * Handle the diploma "deleted" event.
     *
     * @param diploma $diploma
     * @return void
     */
    public function deleted(diploma $diploma)
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
        Cache::forget('diplomas');
    }
}
