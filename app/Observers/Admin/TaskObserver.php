<?php

namespace App\Observers\Admin;

use App\Model\admin\task;
use Illuminate\Support\Facades\Cache;

class TaskObserver
{
    /**
     * Handle the task "created" event.
     *
     * @param  \App\Model\admin\task  $task
     * @return void
     */
    public function created(task $task)
    {
        $this->clearCache();
    }

    /**
     * Handle the task "updated" event.
     *
     * @param  \App\Model\admin\task  $task
     * @return void
     */
    public function updated(task $task)
    {
        $this->clearCache();
    }

    /**
     * Handle the task "deleted" event.
     *
     * @param  \App\Model\admin\task  $task
     * @return void
     */
    public function deleted(task $task)
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
        Cache::forget('tasks');
    }
}
