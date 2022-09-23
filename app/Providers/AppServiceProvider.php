<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function ($view) {
            $view->with('siteSettings', \App\Models\SiteSetting::find(1));
            $view->with('adminsCount', (int) \App\Models\Admin::count());
            $view->with('channelsCount', (int) \App\Models\Channel::count());
            $view->with('plansCount', (int) \App\Models\Plan::count());
            $view->with('messageCount', (int) \App\Models\Message::count());
            $view->with('notificationsCount', (int) \App\Models\Notification::count());
            $view->with('profitGeneratorCount', (int) \App\Models\RevenueEngine::count());
            $view->with('transactionsCount', (int) \App\Models\Transaction::count());
            $view->with('usersLoginCount', (int) \App\Models\UserLogin::count());
            $view->with('singleUsersCount', (int) \App\Models\User::where(['user_type' => 1])->count());
            $view->with('channelUsersCount', (int) \App\Models\User::where(['user_type' => 2])->count());
            $view->with('distributorUsersCount', (int) \App\Models\User::where(['user_type' => 3])->count());
            $view->with('pagesCount', (int) \App\Models\Page::count());
            $view->with('mediaFilesCount', (int) \App\Models\MediaFile::count());

            // Get User new message count
            $view->with('messagesCount', (int) \App\Models\Message::where([
                'to_id'   => (auth()->check()) ? auth()->user()->id : "",
                'is_read' => 0,
            ])->count());

            $view->with('userMessages', \App\Models\Message::getUserMessages([
                'to_id' => (auth()->check()) ? auth()->user()->id : ""
            ],
            [
                'take' => 3
            ]));

            if (auth()->check()) {
                $currentUser = \App\Models\User::where(
                    [
                        'id'  => \Auth::id()
                    ]
                )->first();
                $view->with('plan_expiry', \App\Models\SiteSetting::find(1));
                $view->with('currentUser', $currentUser);
            } else {
                $view->with('currentUser', null);
            }
        });
    }
}
