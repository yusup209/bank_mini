<?php

namespace App\Http\Middleware;

use Closure;


class User
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
        if ($user->status != "user"){
            abort(404);
        }

        return $next($request);
    }
}
