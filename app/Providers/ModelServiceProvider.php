<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Models\Interfaces\AdminInterface', 'App\Models\Admin');
        $this->app->bind('App\Models\Interfaces\ContactQueryInterface', 'App\Models\ContactQuery');
        $this->app->bind('App\Models\Interfaces\MediaFileInterface', 'App\Models\MediaFile');
        $this->app->bind('App\Models\Interfaces\PageInterface', 'App\Models\Page');
        $this->app->bind('App\Models\Interfaces\SiteSettingInterface', 'App\Models\SiteSetting');
        $this->app->bind('App\Models\Interfaces\UserInterface', 'App\Models\User');
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
