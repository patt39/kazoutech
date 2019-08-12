<?php

namespace App\Observers;

use App\Model\admin\info\documentation;
use Illuminate\Support\Facades\Cache;

class DocumentationObserver
{
    /**
     * Handle the documentation "created" event.
     *
     * @param  \App\Model\admin\info\documentation  $documentation
     * @return void
     */
    public function created(documentation $documentation)
    {
        $this->clearCache();
    }

    /**
     * Handle the documentation "updated" event.
     *
     * @param  \App\Model\admin\info\documentation  $documentation
     * @return void
     */
    public function updated(documentation $documentation)
    {
        $this->clearCache();
    }

    /**
     * Handle the documentation "deleted" event.
     *
     * @param  \App\Model\admin\info\documentation  $documentation
     * @return void
     */
    public function deleted(documentation $documentation)
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
        Cache::forget('documentations');
    }
}
