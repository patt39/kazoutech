<?php

namespace App\Observers\Admin;

use App\Model\admin\note;
use Illuminate\Support\Facades\Cache;

class NoteObserver
{
    /**
     * Handle the note "created" event.
     *
     * @param note $note
     * @return void
     */
    public function created(note $note)
    {
         $this->clearCache();
    }

    /**
     * Handle the note "updated" event.
     *
     * @param note $note
     * @return void
     */
    public function updated(note $note)
    {
         $this->clearCache();
    }

    /**
     * Handle the note "deleted" event.
     *
     * @param note $note
     * @return void
     */
    public function deleted(note $note)
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
        Cache::forget('notes');
    }
}
