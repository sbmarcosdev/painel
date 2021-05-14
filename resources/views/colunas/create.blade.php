@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Colunas da Tabela {{ $tabela->descricao_tabela }} </h5>
            </div>

            <form id="uploadForm" action="{{ url('colunas') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')

                <div class="card-body">

                    <div class="input-group p-4">

                        <input type="hidden" name='tabela_id' value='{{ $tabela->id }}'>

                        <div class="input-group-prepend">
                            <span class="input-group-text">Campo</span>
                        </div>

                        <input type="text" name="nome_coluna" class="form-control" required>

                    </div>

                    <div class="input-group p-3 m-1">


                            <button type="button" class="btn btn-outline-secondary m-1" onclick="history.back()">
                                <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip"
                                    data-placement="bottom" title="Voltar">
                                Voltar </button>

                            <button class="btn btn-outline-success  m-1">
                                <img src="{{ asset('img/add-list.png') }}" width="15" data-toggle="tooltip"
                                    data-placement="bottom" title="Salvar">
                                Salvar </button>

                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
