@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container espacamento">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="col-sm-12">
                            <h4 class="tituloPrincipal">Colunas</h4>

                            <form id="uploadForm" action="{{url('/colunas/'.$coluna->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group mt-3">
                                <div class="card p-4">
                                 <div class="input-group m-3">
                                  
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Descrição</span>
                                        </div>
                                        <input type="text" name='nome_coluna' value="{{ $coluna->nome_coluna ?? '' }}" class='form-control' required >
                                       
                                    
                 

                                    </div>

                                    <div class="input-group m-3">
                                    

                                    </div>

                                    <div class="input-group m-3">

                                    <button type="button" class="btn btn-secondary m-2" onclick="window.location = '{{url('tabelas')}}'">
                                        <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Voltar">
                                        Voltar </button>

                                    <button class=" btn btn-success m-2">
                                        <img src="{{ asset('img/add-list.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Salvar">
                                        Salvar </button>

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
