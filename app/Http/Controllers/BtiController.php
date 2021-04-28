<?php

namespace App\Http\Controllers;

use App\Fatura;
use App\Empresa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BtiController extends Controller
{
    public function index()
    {
        return view('bti_login.login');
    }

    public function getEmpresa(Request $request)
    {
        $user = User::where('email', $request->email )->first();

        return $user ? $user->empresa()->nome : null;
    }

    public function usuario_empresa(Request $request)
    {
        session()->put(['empresa_id' => $request->empresa_id]);

        $user = User::find(Auth::user()->id);

        $user->update(['empresa_id' => $request->empresa_id]);
    }

    public function report()
    {
        $emp = session()->get('empresa_id');

        $empresa = Empresa::find($emp);

        $faturas = Fatura::all();

        return view('tabelas.relatorio', compact('empresa','faturas'));
    }



}
