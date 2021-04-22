@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container espacamento">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="col-sm-12">
                            <h4 class="tituloPrincipal">Produto</h4>

                            <form id="uploadForm" action="{{url('/produto/'.$produto->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group mt-3">
                                <div class="card p-4">
                                 <div class="input-group m-3">
                                  
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Tipo</span>
                                        </div>
                                        <input type="text" name='tipo' value="{{ $produto->tipo ?? '' }}" class='form-control' required >
                                       
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Descrição</span>
                                        </div>
                                       
                                        <input type="text" name="descricao" class="form-control" value="{{ $produto->descricao ?? '' }}" required >            

                                    </div>

                                    <div class="input-group m-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Cor Primária</span>
                                        </div>
                                        <input type="color" value="{{ $produto->cor ?? '' }}" name="cor" id="cor1" class='form-control' onchange="jsCorPrimaria()" />
                                       
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Valor Unitário</span>
                                        </div>
                                       
                                        <input type="number" min="0" max="9999" name="valor_unitario" class="form-control" value="{{ $produto->valor_unitario ?? '' }}" required>
                                     
                                        </div>

                                    </div>

                                    <div class="input-group m-3">

                                    <button type="button" class="btn btn-secondary m-2" onclick="window.location = '{{url('home')}}'">
                                        <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Voltar">
                                        Voltar </button>

                                    <button class=" btn btn-success m-2" onclick="">
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

@section('scripts')

<script>
    function jsCorPrimaria() {
        $('#cor1').val($('#inputcolor').val());
    }
</script>
@endsection