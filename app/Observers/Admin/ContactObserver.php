<?php

namespace App\Observers\Admin;

use App\Model\admin\contact;
use Illuminate\Support\Facades\Cache;

class ContactObserver
{
    /**
     * Handle the contact "created" event.
     *
     * @param contact $contact
     * @return void
     */
    public function created(contact $contact)
    {
        $this->clearCache();
    }

    /**
     * Handle the contact "updated" event.
     *
     * @param contact $contact
     * @return void
     */
    public function updated(contact $contact)
    {
        $this->clearCache();
    }

    /**
     * Handle the contact "deleted" event.
     *
     * @param contact $contact
     * @return void
     */
    public function deleted(contact $contact)
    {
        $this->clearCache();
    }

    protected function clearCache()
    {
        Cache::forget('contacts');
    }
}
