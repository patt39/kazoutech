<?php

namespace App\Observers\Admin;

use App\Model\admin\categoryfaq;
use Illuminate\Support\Facades\Cache;

class CategoryfaqObserver
{
    /**
     * Handle the categoryfaq "created" event.
     *
     * @param  \App\Model\admin\categoryfaq  $categoryfaq
     * @return void
     */
    public function created(categoryfaq $categoryfaq)
    {
         $this->clearCache();
    }

    /**
     * Handle the categoryfaq "updated" event.
     *
     * @param  \App\Model\admin\categoryfaq  $categoryfaq
     * @return void
     */
    public function updated(categoryfaq $categoryfaq)
    {
         $this->clearCache();
    }

    /**
     * Handle the categoryfaq "deleted" event.
     *
     * @param  \App\Model\admin\categoryfaq  $categoryfaq
     * @return void
     */
    public function deleted(categoryfaq $categoryfaq)
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
        Cache::forget('categoryfaqs');
    }
}
