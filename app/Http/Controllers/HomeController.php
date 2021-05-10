<?php

namespace App\Http\Controllers;

use App\TabelaCiclo;
use App\Empresa;
use App\Produto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.empr');
    }

    public function index()
    {
        $empresa_id = Auth::user()->empresa_id;

        if($empresa_id){

            $tabelas = TabelaCiclo::where('empresa_id', $empresa_id )->distinct()->select('tabela_id')->get();

            $results = array();

            foreach($tabelas as $tabela ){

                $tabela_id = $tabela->tabela_id;

                $sql = "SELECT *
                        FROM tabela_ciclos
                        where tabela_id = $tabela_id
                        and id < ( SELECT max(id)
                                        FROM tabela_ciclos
                                    where tabela_id = $tabela_id )
                    order by id desc
                        limit 1";

                $regs = DB::select($sql);



                foreach ($regs as $r){
                    $penultimo_id = $r->id;
                };

                $penultimo = TabelaCiclo::find( $penultimo_id );

                $ultimo = TabelaCiclo::where('empresa_id', $empresa_id )
                                    ->where('tabela_id', $tabela_id )
                                    ->latest('inicio')
                                    ->first();

                array_push($results,  ['p' => $penultimo , 'u' => $ultimo ] );

            }

                return view('home', compact('results'));
            }
            else {
                    return view('erro');
            }
    }


}
