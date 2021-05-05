<?php

namespace App\Http\Controllers;

use App\Tabela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    public function index()
    {
        $tabelas = Tabela::where('empresa_id', Auth::user()->empresa_id )->get();

        return view('infos.index', compact('tabelas'));
    }

    public function show($id)
    {
        $tabelas = Tabela::find($id);
        $colunas = TabelaColuna::where('tabela_id', $tabelas->id)->get();
        $regs = TabelaDado::where('tabela_id', $tabelas->id)->get();

        return view('infos.show', compact('tabelas','colunas','regs'));
    }

}
