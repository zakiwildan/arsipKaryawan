<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->level == 'Admin' || $request->user()->level == 'Karyawan')
        {
            return redirect('/Home');
        }
        return $next($request);
    }
}
