<?php
# @Date:   2019-11-07T21:14:22+00:00
# @Last modified time: 2019-11-07T21:32:46+00:00




namespace App\Http\Middleware;

use Closure;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, String $role)
    {
      if(!$request->user() || !$request->user()->hasAnyRole($role)){
      return redirect()->route('home');
      }
        return $next($request);
    }
}
