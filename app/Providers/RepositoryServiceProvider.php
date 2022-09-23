<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Interfaces\AdminRepositoryInterface', 'App\Repositories\AdminRepository');
        $this->app->bind(
            'App\Repositories\Interfaces\ContactQueryRepositoryInterface',
            'App\Repositories\ContactQueryRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\MediaFileRepositoryInterface',
            'App\Repositories\MediaFileRepository'
        );
        $this->app->bind('App\Repositories\Interfaces\PageRepositoryInterface', 'App\Repositories\PageRepository');
        $this->app->bind(
            'App\Repositories\Interfaces\SiteSettingRepositoryInterface',
            'App\Repositories\SiteSettingRepository'
        );
        $this->app->bind('App\Repositories\Interfaces\UserRepositoryInterface', 'App\Repositories\UserRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
