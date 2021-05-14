@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5> Edição de Colunas </h5>
            </div>
            <div class="card-body">
                <form id="uploadForm" action="{{ url('/colunas/' . $coluna->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <p> Coluna da Tabela {{ $coluna->tabela()->descricao_tabela ?? '' }}
                    <div class="input-group p-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Descrição</span>
                        </div>
                        <input type="text" name='nome_coluna' value="{{ $coluna->nome_coluna ?? '' }}"
                            class='form-control' required>
                    </div>
                    <div class="input-group m-2">
                        <button type="button" class="btn btn-outline-secondary m-2"
                            onclick="window.location = '{{ url('/tabelas/' . $coluna->tabela()->id . '/edit') }}'">
                            <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip"
                                data-placement="bottom" title="Voltar">
                            Voltar
                        </button>

                        <button class=" btn btn-outline-success m-2">
                            <img src="{{ asset('img/add-list.png') }}" width="15" data-toggle="tooltip"
                                data-placement="bottom" title="Salvar">
                            Salvar </button>

                </form>
                @if( $coluna->id == $ultima_coluna)
                <form action="{{ url('/colunas/' . $coluna->id) }}" method="POST"
                    onsubmit="return confirm('Confirma Exclusão da Coluna?');">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <button type="submit" class="btn btn-outline-success m-2" value="X" title="Excluir Coluna">
                        <img src="{{ asset('img/007-excluir.svg') }}" width="15" data-toggle="tooltip"
                            data-placement="bottom" title="Excluir">
                        Excluir Coluna
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>

@endsection
