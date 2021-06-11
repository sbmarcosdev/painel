<?php

namespace App\Http\Controllers;

use App\User;
use App\Fatura;
use App\Empresa;
use App\Mail\bti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function erro()
    {
          return view('erro');
    }

    public function chamado()
    {

        $empresa_id = Auth::user()->empresa_id;

        if($empresa_id){

            $empresa = Empresa::find($empresa_id);
            return view('chamados.form', compact('empresa'));
        }
        else
        return view('erro');
    }

    public function mail(Request $request)
    {

        try
            {
                Mail::to('chamado@btiestrategica.com.br')->send(new bti($request));
            }
            catch (\Swift_RfcComplianceException $e)
            {
                $msgErro = "Falha no envio de e-mail : ";
                $msgErro .= $e->getMessage();
            }

            if(isset ($e)){

                $erro = ['erro' => $msgErro ];

                return view('chamados.form', compact('request','erro'));
            }

            else {

                $msg = ['msg' => 'Chamado Registrado com Sucesso' ];

                return view('chamados.form', compact('request','msg'));
            }

    }
}
