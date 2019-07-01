<?php

namespace App\Observers\Admin;

use App\Model\admin\faq;
use Illuminate\Support\Facades\Cache;

class FaqObserver
{
    /**
     * Handle the faq "created" event.
     *
     * @param  \App\Model\admin\faq  $faq
     * @return void
     */
    public function created(faq $faq)
    {
        $this->clearCache();
    }

    /**
     * Handle the faq "updated" event.
     *
     * @param  \App\Model\admin\faq  $faq
     * @return void
     */
    public function updated(faq $faq)
    {
        $this->clearCache();
    }

    /**
     * Handle the faq "deleted" event.
     *
     * @param  \App\Model\admin\faq  $faq
     * @return void
     */
    public function deleted(faq $faq)
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
        Cache::forget('faqs');
    }
}
