<?php

namespace App\Http\Middleware;

use Closure;

class Teller
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
        $user = \Auth::user();
        if ($user->status != "teller"){
            abort(404);
        }

        return $next($request);
    }
}
