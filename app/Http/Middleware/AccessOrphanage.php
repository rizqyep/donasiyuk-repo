<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
class AccessOrphanage
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
        if(Auth::user() && Auth::user()->type == 'orphanage'){
            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
