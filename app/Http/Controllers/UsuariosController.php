<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Empresa;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('usuarios.index', compact('users'));
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        $empresas = Empresa::all();

        return view('usuarios.form', compact('user', 'empresas'));
    }

    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);

        $user->update([
                        'name' => $request->name,
                        'empresa_id' => $request->empresa_id,
                        'admin' => $request->admin
                      ]);

        return redirect('usuarios');
    }

    public function destroy($user_id)
    {
        $user = User::find($user_id);

        $user->delete();

        $empresas = Empresa::all();

        return view('usuarios.form', compact('user', 'empresas'));
    }
}
