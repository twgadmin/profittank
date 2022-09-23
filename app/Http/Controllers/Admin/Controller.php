<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        \View::share('siteSettings', \App\Models\SiteSetting::find(1));
    }
    
    /**
     * Check if the logged in user is admin and then redirect accordingly
     * @return void
     */
    public function isAdmin()
    {
        $redirect = strpos(url()->current(), '/admin') !== false ? 'admin' : '/';

        if (auth()->user()) {
            $user  = auth()->user();
            $roles = \DB::table('role_user')->where('user_id', $user->id)->pluck('role_id')->toArray();

            if (!in_array(1, $roles) && !in_array(2, $roles)) {
                header('Location: ' . \URL::to($redirect));
                die();
            }
        } else {
            header('Location: ' . \URL::to($redirect));
            die();
        }
    }

    /*
    * getRestrictedPagesIds
    *
    **/
    public function getRestrictedPagesIds()
    {
        return \DB::table('pages')
            ->whereIn('slug', ['home', 'contact'])
            ->pluck('id')
            ->toArray();
    }

    /*
    * getRestrictedNewsIds
    *
    **/
    public function getRestrictedNewsIds()
    {
        return \DB::table('news')
            ->whereIn('slug', ['home', 'contact'])
            ->pluck('id')
            ->toArray();
    }
}
