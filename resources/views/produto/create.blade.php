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

                            <form id="uploadForm" action="{{url('produto')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group mt-3">
                                <div class="card p-4">
                                 <div class="input-group m-3">
                                  
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Tipo</span>
                                        </div>
                                        <input type="text" name='tipo' class='form-control' required >
                                       
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Descrição</span>
                                        </div>
                                       
                                        <input type="text" name="descricao" class="form-control" required>
                                     
                                        

                                    </div>

                                    <div class="input-group m-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Cor Primária</span>
                                        </div>
                                        <input type="color"  name="cor" id="cor1" class='form-control' onchange="jsCorPrimaria()" />
                                       
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Valor Unitário</span>
                                        </div>
                                       
                                        <input type="number" min="0" max="9999" name="valor_unitario" class="form-control" required>
                                     
                                        </div>

                                    </div>

                                   
                                    <button class=" btn btn-success" onclick="">
                                        <img src="{{ asset('img/mais.svg') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Salvar">
                                        Salvar </button>
                                    <button type="button" class="btn btn-secondary" onclick="window.location = '{{url('home')}}'">
                                        <img src="{{ asset('img/documentos.svg') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Voltar">
                                        Voltar </button>

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