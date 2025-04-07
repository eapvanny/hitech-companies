<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;
// use App\Http\Middleware\Setwebrowser;

class Setwebrowser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
        // $userAgent = $request->header('User-Agent');

        // if (stripos($userAgent, 'Chrome') !== false) {
        //     $browser = 'Chrome';
        // } elseif (stripos($userAgent, 'Firefox') !== false) {
        //     $browser = 'Firefox';
        // } elseif (stripos($userAgent, 'Safari') !== false) {
        //     $browser = 'Safari';
        // } elseif (stripos($userAgent, 'Edge') !== false) {
        //     $browser = 'Edge';
        // } elseif (stripos($userAgent, 'Opera') !== false) {
        //     $browser = 'Opera';
        // } else {
        //     $browser = 'Unknown';
        // }

        // // dd($browser);
        // if($browser != 'Firefox'){
        //     // dd('This system can support on FireFox only.');
        // return $next($request);

        // }else{
        //     return redirect()->away('https://hitech.crm.com');
        // }
    }
}
