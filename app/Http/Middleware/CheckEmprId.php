<?php

namespace App\Http\Middleware;

use Closure;
use App\Tabela;
use Illuminate\Support\Facades\Auth;

class CheckEmprId
{
    public function handle($request, Closure $next)
    {

        if(Auth::user()->admin == 'S'){
            session()->put(['isAdmin' => true ]);
            $admin = true;
            return $next($request);
        }

        $empresa_id = Auth::user()->empresa_id;

        if($empresa_id){
            session()->put(['empresa_id' => $empresa_id ]);
        }

        $autorizado = session()->get('empresa_id');

        if ( isset($autorizado) || $admin ) {

            $partes = explode('/', $request->path() );

            if (sizeof($partes) > 1){

                    $tabEmpr = Tabela::where('empresa_id', $empresa_id )->distinct()->select('id')->get();
                    $ids = [];

                    foreach ($tabEmpr as $idt){
                    array_push($ids, $idt->id);
                    }

                    if (in_array($partes[1], $ids))
                            return $next($request);
                    else
                            return redirect('erro');

                }
                return $next($request);
            }
            else
            {
                return redirect('erro');
            }
    }
}
