<?php

namespace App\Observers\Admin;

use App\Model\admin\color;
use Illuminate\Support\Facades\Cache;

class ColorObserver
{
    /**
     * Handle the color "created" event.
     *
     * @param color $color
     * @return void
     */
    public function created(color $color)
    {
        $this->clearCache();
    }

    /**
     * Handle the color "updated" event.
     *
     * @param color $color
     * @return void
     */
    public function updated(color $color)
    {
        $this->clearCache();
    }

    /**
     * Handle the color "deleted" event.
     *
     * @param color $color
     * @return void
     */
    public function deleted(color $color)
    {
        $this->clearCache();
    }

    protected function clearCache()
    {
        Cache::forget('colors');
    }
}
