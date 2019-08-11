<?php

namespace App\Providers;

use App\Model\admin\about;
use App\Model\admin\categoryfaq;
use App\Model\admin\color;
use App\Model\admin\contact;
use App\Model\admin\faq;
use App\Model\admin\info\documentation;
use App\Model\admin\note;
use App\Model\admin\occupation;
use App\Model\admin\partial\diploma;
use App\Model\admin\task;
use App\Model\user\technician;
use App\Model\user\User;
use App\Observers\Admin\AboutObserver;
use App\Observers\Admin\CategoryfaqObserver;
use App\Observers\Admin\ColorObserver;
use App\Observers\Admin\ContactObserver;
use App\Observers\Admin\FaqObserver;
use App\Observers\Admin\NoteObserver;
use App\Observers\Admin\OccupationObserver;
use App\Observers\Admin\Partial\DiplomaObserver;
use App\Observers\Admin\UserObserver;
use App\Observers\DocumentationObserver;
use App\Observers\User\TechnicianObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        about::observe(AboutObserver::class);
        categoryfaq::observe(CategoryfaqObserver::class);
        color::observe(ColorObserver::class);
        contact::observe(ContactObserver::class);
        faq::observe(FaqObserver::class);
        note::observe(NoteObserver::class);
        diploma::observe(DiplomaObserver::class);
        occupation::observe(OccupationObserver::class);
        user::observe(UserObserver::class);
        technician::observe(TechnicianObserver::class);
        documentation::observe(DocumentationObserver::class);
    }
}
