<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class UserIsCustomer
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
        if( auth()->user()->type == User::CUSTOMER ){
            return $next($request);
        }

        return response([
            'message' => 'Not allowed for this user type'
        ], 403);
    }
}
