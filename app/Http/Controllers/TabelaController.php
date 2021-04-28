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
    }

    public function index()
    {
        $tabelas = Tabela::all();

        return view('tabelas.index', compact('tabelas'));
    }

    public function show($id)
    {
        $tabelas = Tabela::find($id);
        $colunas = TabelaColuna::where('tabela_id', $tabelas->id)->get();
        $regs = TabelaDado::where('tabela_id', $tabelas->id)->get();

        return view('tabelas.show', compact('tabelas','colunas','regs'));
    }

    public function create()
    {
        $emp = session()->get('empresa_id');

        $empresa = Empresa::find($emp);

        return view('tabelas.create', compact('empresa'));
    }

    public function store(Request $request)
    {
        Tabela::create([
                        'empresa_id' => $request->empresa_id,
                        'descricao_tabela' => $request->descricao_tabela
                        ]);

        // return redirect();
    }

    public function edit($id)
    {
        $tabela = Tabela::find($id);

        $colunas = TabelaColuna::where('tabela_id', $id)->get();

        return view('tabelas.frm', compact('tabela','colunas'));
    }
}
