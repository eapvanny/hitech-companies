<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLanguage
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
        // Check if the 'applocale' session variable is set
        if (session()->has('user_lang')) {
            App::setLocale(session('user_lang'));
        }

        return $next($request);
    }
}