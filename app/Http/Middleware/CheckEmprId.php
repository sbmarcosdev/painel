<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEmprId
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->empresa_id){

            session()->put(['empresa_id' => Auth::user()->empresa_id ]);
        }

        $loginAdmin = session()->get('empresa_id');

        if (isset($loginAdmin)) {


                return $next($request);

        } else {
            // $request->session()->flush();
             return redirect('erro');
        }
    }
}
