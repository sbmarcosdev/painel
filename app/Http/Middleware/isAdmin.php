<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->admin == 'S') {

            return $next($request);
        }
        else {
            return redirect('erro');
        }
    }
}
