<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.empr');
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        Cliente::create([
                          'nome'=>$request->nome,
                          'email'=>$request->email,
                          'valor'=>$request->ciclo
                        ]);

        return redirect('home');
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.frm', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        $cliente->update([
                            'nome'=>$request->nome,
                            'email'=>$request->email,
                            'valor'=>$request->ciclo
                        ]);

        return redirect('home');
    }
}
