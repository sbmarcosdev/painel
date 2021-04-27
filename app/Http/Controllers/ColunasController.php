<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tabela;
use App\TabelaColuna;


class ColunasController extends Controller
{
    public function novaColuna($tabela_id)
    {        
        $tabela = Tabela::find($tabela_id);

        return view('colunas.create', compact('tabela'));
    }

    public function edit($id)
    {        
        $coluna = TabelaColuna::find($id);

        $tabela = Tabela::find($coluna->tabela_id);

        return view('colunas.frmcolunas', compact('tabela','coluna'));
    }

    public function update(Request $request, $id)
    {
        $coluna = TabelaColuna::find($id);

        $coluna->update(['nome_coluna' => $request->nome_coluna ]);

        return redirect('tabelas/'.$coluna->tabela_id . '/edit');
    }

    public function store(Request $request)
    {
        $coluna = TabelaColuna::create([
                                         'tabela_id'=> $request->tabela_id, 
                                         'nome_coluna' => $request->nome_coluna   
                                       ]);

        return redirect('tabelas/'.$coluna->tabela_id . '/edit');
    }

    public function destroy($coluna_id)
    {
        $coluna = TabelaColuna::find($coluna_id);

        $tabela_id = $coluna->tabela_id;

        $coluna->delete();

        return redirect('tabelas/'.$tabela_id . '/edit');
    }
}
