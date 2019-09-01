<?php

namespace App\Observers\Admin;

use App\Model\admin\page\about;
use Illuminate\Support\Facades\Cache;

class AboutObserver
{
    /**
     * Handle the about "created" event.
     *
     * @param  \App\Model\admin\page\about  $about
     * @return void
     */
    public function created(about $about)
    {
        $this->clearCache();
    }

    /**
     * Handle the about "updated" event.
     *
     * @param  \App\Model\admin\page\about  $about
     * @return void
     */
    public function updated(about $about)
    {
        $this->clearCache();
    }

    /**
     * Handle the about "deleted" event.
     *
     * @param  \App\Model\admin\page\about  $about
     * @return void
     */
    public function deleted(about $about)
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
        Cache::forget('abouts');
    }
}
