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

    public function mail()
    {
        $id = 1;
        $user = User::where('id', $id)->first();

        // return new bti($user);
        Mail::to($user)->send(new bti($user));
    }
}
