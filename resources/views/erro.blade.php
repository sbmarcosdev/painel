@extends('layouts.app')

@section('content')
<div class="container">

            <div class="card">
                <div class="card-header"><h4 class="tituloPrincipal">Controle de Integrações</h4></div>

                <div class="card-body">
                        <div class="alert alert-danger" >
                            <h5> Usuário Não Autorizado
                            <hr>
                            <p> Solicite a liberação do seu acesso </p>
                            <a href='mailto:chamado@btiestrategica.com.br'>chamado@btiestrategica.com.br</a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-danger">Sair</button>
                        </form>
                    </div>
                </div>
            </div>
</div>

@endsection
