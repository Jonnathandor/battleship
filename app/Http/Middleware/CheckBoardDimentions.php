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
        $x = $request->input('x', 'is_not_defined'); // the second param acts like a default
        $y = $request->input('y', 'is_not_defined');

        // empty will check for empty strings, null or undefined
        if(empty($x) || empty($y)){
            // dd('nope');
            abort(405, "Mising params in the request");
        }

        return $next($request);
    }
}
