@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container espacamento">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="col-sm-12">
                            <h5 class="tituloPrincipal">Colunas da Tabela {{ $tabela->descricao_tabela }}</h5>

                            <form id="uploadForm" action="{{url('colunas')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group mt-3">
                                <div class="card p-4">
                                 <div class="input-group m-3">

                                        <input type="hidden" name='tabela_id' value='{{ $tabela->id }}' >

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Campo</span>
                                        </div>

                                        <input type="text" name="nome_coluna" class="form-control" required>

                                    </div>

                                    <div class="input-group m-3">
                                        <button type="button" class="btn btn-secondary m-1" onclick="history.back()">
                                            <img src="{{ asset('img/arrow-back.png') }}"  width="15" data-toggle="tooltip" data-placement="bottom" title="Voltar">
                                                Voltar </button>

                                        <button class="btn btn-success  m-1">
                                            <img src="{{asset('img/add-list.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Salvar">
                                                Salvar </button>

                                    </div>
                                </div>


                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

