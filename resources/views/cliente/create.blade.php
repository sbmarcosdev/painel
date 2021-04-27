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
                                            <span class="input-group-text">Nome</span>
                                        </div>
                                        <input type="text" name='nome' class='form-control' required >
                                       
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">E-mail</span>
                                        </div>
                                       
                                        <input type="email" name="email" class="form-control" required>
                                     
                                        

                                    </div>

                                    <div class="input-group m-3">
                                        
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Ciclo</span>
                                        </div>
                                       
                                        <input type="number" min="0" max="9999" name="ciclo" class="form-control" required>
                                     
                                        </div>

                                    </div>

                                    <div class="input-group m-3">
                                        <button class=" btn btn-success  m-1" onclick="">
                                            <img src="{{ asset('img/mais.svg') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Salvar">
                                                Salvar </button>
                                            <button class="btn btn-secondary m-1" onclick="window.location = '{{url('home')}}'">
                                                <img src="{{ asset('img/documentos.svg') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Voltar">
                                                Voltar </button>
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

@section('scripts')

<script>
    function jsCorPrimaria() {
        $('#cor1').val($('#inputcolor').val());
    }
</script>
@endsection