<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Tabela;
use App\TabelaColuna;
use App\TabelaDado;
use Illuminate\Support\Facades\Auth;

class TabelaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.empr');
    }

    public function index()
    {
        if (session()->get('isAdmin')){
            $tabelas = Tabela::all()->orderBy('empresa_id');
        }else{
            $tabelas = Tabela::where('empresa_id', Auth::user()->empresa_id )->get();
        }
        return view('tabelas.index', compact('tabelas'));
    }

    public function show($id)
    {
        $tabelas = Tabela::find($id);
        $colunas = TabelaColuna::where('tabela_id', $tabelas->id)->orderBy('ordem')->get();
        $regs = TabelaDado::where('tabela_id', $tabelas->id)->get();

        return view('tabelas.show', compact('tabelas','colunas','regs'));
    }

    public function create()
    {
        $empresas = Empresa::all();

        return view('tabelas.create', compact('empresas'));
    }

    public function store(Request $request)
    {
        Tabela::create([
                        'empresa_id' => $request->empresa_id,
                        'descricao_tabela' => $request->descricao_tabela
                        ]);

        return redirect('tabelas');
    }

    public function update(Request $request, $tabela_id)
    {
        $tabela = Tabela::find($tabela_id);

        $tabela->update(['descricao_tabela' => $request->descricao_tabela]);

    }

    public function edit($id)
    {
        $tabela = Tabela::find($id);

        $colunas = TabelaColuna::where('tabela_id', $id)->orderBy('ordem')->get();

        return view('tabelas.frm', compact('tabela','colunas'));

        // return view('tabelas.list', compact('tabela','colunas'));
    }

    public function destroy($tabela_id)
    {
        $tabela = Tabela::find($tabela_id);

        $tabela->delete();

        return redirect('tabelas');
    }
}
