<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.empr');
    }

    public function index()
    {
        $empresas = Empresa::all();
        return view('empresa.index', compact('empresas'));
    }

    public function create()
    {
        return view('Empresa.create');
    }

    public function store(Request $request)
    {
        Empresa::create([
                          'nome'=>$request->nome,
                          'razao_social'=>$request->razao_social,
                          'cnpj'=>$request->cnpj,
                          'site'=>$request->site
                        ]);

        return redirect('empresa');
    }

    public function edit($id)
    {
        $empresa = Empresa::find($id);

        return view('empresa.frm', compact('empresa'));
    }

    public function update(Request $request, $id)
    {
        $Empresa = Empresa::find($id);

        $Empresa->update([
                            'nome'=>$request->nome,
                            'razao_social'=>$request->razao_social,
                            'cnpj'=>$request->cnpj,
                            'site'=>$request->site
                        ]);

        return redirect('empresa');
    }
}
