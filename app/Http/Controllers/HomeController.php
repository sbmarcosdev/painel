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

            $tabela_id = 1;

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
                $penultimo = $r;
            };

            $ultimo = TabelaCiclo::where('empresa_id', $empresa_id )
                                ->where('tabela_id', $tabela_id )
                                ->latest('inicio')
                                ->first();

             return view('home', compact('regs'));
            }
            else {
                    return view('erro');
            }
    }

    public function index_OLD ()
    {
        if(Auth::user()->empresa_id){

        $emp = session()->get('empresa_id');

        $empresa = Empresa::find($emp);

        $regsdb = TabelaCiclo::where('empresa_id', $emp )->get();

        dd($regsdb);

        $regs = array();

        foreach ($regsdb as $reg){

                $hora2 = date_format($reg->updated_at,"H:i:s");

                $hora1 = date_format($reg->created_at,"H:i:s");

                $date1 = Carbon::createFromFormat('Y-m-d H:i:s', $reg->updated_at);

                $date2 = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now());

                $value = $date2->diffInMinutes($date1);

                $data1 = $reg->data;

                array_push($regs, [
                                'nome' => $reg->nome,
                                'email'=> $reg->email,
                                'data' => $data1,
                                'inicio' => $hora1,
                                'ultimo' => $hora2,
                                'ciclo'=> $reg->valor,
                                'diferenca' => $value,
                              ]);
                }

            $prods = Produto::all();

            return view('home', compact('empresa', 'regs', 'prods'));
        }
        else {
            return view('erro');
        }
    }
}
