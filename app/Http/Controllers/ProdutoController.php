<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('produto.create');
    }

    public function store(Request $request)
    {
        Produto::create([ 'tipo'=>$request->tipo,
        'descricao'=>$request->descricao,
        'valor_unitario'=>$request->valor_unitario,
        'cor'=>$request->cor
        ]);

        return redirect('home');
    }



    public function edit($id)
    {
        $produto = Produto::find($id);

        return view('produto.frm', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $prod = Produto::find($id);

        $prod->update([ 'tipo'=>$request->tipo,
                        'descricao'=>$request->descricao,
                        'valor_unitario'=>$request->valor_unitario,
                        'cor'=>$request->cor
                        ]);

        return redirect('home');
    }

}
