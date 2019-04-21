<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;
use Closure;
use Illuminate\Support\Facades\App;
use Config;
use Session;


class Main extends Middleware
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
        $raw_locale = Session::get('locale');

        if ( null === $raw_locale ) {
            Session::put('locale', 'ru');
            App::setLocale('ru');
        } else {
            App::setLocale($raw_locale);
        }

        return $next($request);
    }
}
