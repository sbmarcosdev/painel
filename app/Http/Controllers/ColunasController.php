<?php

namespace App\Http\Controllers;

use App\Tabela;
use App\TabelaColuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class ColunasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.empr');
    }

    public function novaColuna($tabela_id)
    {
        $tabela = Tabela::find($tabela_id);

        return view('colunas.create', compact('tabela'));
    }

    public function edit($id)
    {
        $coluna = TabelaColuna::find($id);

        $tabela = Tabela::find($coluna->tabela_id);

        $ultima_coluna =  TabelaColuna::where('tabela_id', $tabela->id )->max('ordem');

        return view('colunas.frmcolunas', compact('tabela','coluna','ultima_coluna'));
    }

    public function update(Request $request, $id)
    {
        $coluna = TabelaColuna::find($id);

        $coluna->update(['nome_coluna' => $request->nome_coluna ]);

        return redirect('tabelas/'.$coluna->tabela_id . '/edit');
    }

    public function store(Request $request)
    {

        $coluna = TabelaColuna::where('tabela_id', $request->tabela_id)
                                     ->orderBy('ordem', 'desc')
                                     ->first();
        if ($coluna)
            $ultima_coluna = $coluna->ordem + 1;
         else
            $ultima_coluna = 1;

        $coluna = TabelaColuna::create([
                                         'tabela_id'=> $request->tabela_id,
                                         'nome_coluna' => $request->nome_coluna,
                                         'ordem' =>  $ultima_coluna
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

    public function reorder(Request $request)
    {

        $request->validate([
            'ids'         => 'required|array',
            'ids.*'       => 'integer',
            'category_id' => 'required|integer|exists:tabelas,id',
        ]);

        foreach ($request->ids as $index => $id) {

            DB::table('tabela_colunas')
                ->where('id', $id)
                ->where('tabela_id', $request->category_id )
                ->update([
                            'ordem' => $index + 1,
                            'tabela_id' => $request->category_id
                         ]);
        }

         $positions = Tabela::find($request->category_id)
             ->ordens()
             ->pluck('ordem', 'id');

        return response(compact('positions'), Response::HTTP_OK);
    }
}
