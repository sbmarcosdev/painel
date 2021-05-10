<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Tabela;
use App\TabelaColuna;
use App\TabelaDado;
use Illuminate\Support\Facades\Auth;

class TabAjaxController extends Controller
{
    public function show($id)
    {
        $tabelas = Tabela::find($id);
        $colunas = TabelaColuna::where('tabela_id', $tabelas->id)->get();
        $regs = TabelaDado::where('tabela_id', $tabelas->id)->get();

        return view('tabAjax.show', compact('tabelas','colunas','regs'));
    }

    public function index($empresa_id)
    {
        $tabelas = Tabela::where('empresa_id', $empresa_id)->get();

        $tabs = [];

        foreach  ($tabelas as $tab){
            array_push($tabs,  $tab->id);
        }

         return json_encode($tabs);
    }
}
