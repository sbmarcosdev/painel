@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container espacamento">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="col-sm-12">
                            <h4 class="tituloPrincipal">Tabela</h4>

                            <form id="uploadForm" action="{{url('tabelas')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group mt-3">
                                <div class="card p-4">
                                 <div class="input-group m-3">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Empresa</span>
                                        </div>

                                        <input type="hidden" name='empresa_id' value='{{ $empresa->id }}' >

                                        <input type="text" name='empresa' class='form-control' value='{{ $empresa->nome }}' readonly >

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Nome da Tabela</span>
                                        </div>

                                        <input type="text" name="descricao_tabela" class="form-control" required>



                                    </div>

                                    <div class="input-group m-3">

                                        <button class="btn btn-secondary m-1" onclick="window.location = '{{url('tabelas')}}'">
                                            <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Voltar">
                                            Voltar </button>

                                        <button class=" btn btn-success  m-1" onclick="">
                                            <img src="{{ asset('img/add-list.png')}}" width="15" data-toggle="tooltip" data-placement="bottom" title="Salvar">
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

@section('scripts')

<script>
    function jsCorPrimaria() {
        $('#cor1').val($('#inputcolor').val());
    }
</script>
@endsection
