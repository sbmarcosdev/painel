<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Empresa;
use App\Produto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $emp = session()->get('empresa_id');

        $empresa = Empresa::find($emp);

        $regsdb = Cliente::all();

        $regs = array();

        foreach ($regsdb as $reg)
        {

            $date1 = Carbon::createFromFormat('Y-m-d H:i:s', $reg->updated_at);
            
            $hora2 = date_format($reg->updated_at,"H:i:s");

            $hora1 = date_format($reg->created_at,"H:i:s");

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
}
