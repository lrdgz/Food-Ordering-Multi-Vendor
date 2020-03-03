<?php

namespace App\Http\Middleware;

use Closure;

class EmailIsVerified
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
        if( auth()->user()->verified_email ){
            return $next($request);
        }

        return response([
            'message' => 'Your email is not verified.'
        ], 403);
    }
}
