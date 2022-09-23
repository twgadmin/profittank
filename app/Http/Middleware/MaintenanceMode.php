<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\App;

use Closure;

class MaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($_SERVER['HTTP_HOST'] == 'profittankdynamic.abdulkhanprojects.com') {
            echo view('under-maintenance');die();
        }

        return $next($request);
    }
}
