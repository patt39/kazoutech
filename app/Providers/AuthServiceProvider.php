<?php

namespace App\Providers;

use App\Model\admin\annonce;
use App\Model\admin\blog;
use App\Model\user\profile;
use App\Policies\AnnoncePolicy;
use App\Policies\BlogPolicy;
use App\Policies\ProfilePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Model\user\technician' => 'App\Policies\TechnicianPolicy',
        blog::class => BlogPolicy::class,
        profile::class => ProfilePolicy::class,
        annonce::class => AnnoncePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        //
    }
}
