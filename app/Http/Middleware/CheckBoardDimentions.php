<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBoardDimentions
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
        $x = $request->input('x');
        $y = $request->input('y');

        if($x < 10 || $y < 10){
            dd('nope');
        }

        return $next($request);
    }
}
