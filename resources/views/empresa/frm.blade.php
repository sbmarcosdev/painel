@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container espacamento">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="col-sm-12">
                            <h4 class="tituloPrincipal">Empresa</h4>

                            <form action="{{url('empresa/'.$empresa->id)}}" method="POST" enctype="form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group mt-3">
                                <div class="card p-4">
                                 <div class="input-group m-3">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Nome Fantasia</span>
                                        </div>
                                        <input type="text" name='nome' value="{{ $empresa->nome ?? '' }}" class='form-control' required >

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Razão Social</span>
                                        </div>

                                        <input type="text" name="razao_social" class="form-control" value="{{ $empresa->razao_social ?? '' }}" required >

                                    </div>

                                    <div class="input-group m-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">CNPJ</span>
                                        </div>
                                        <input type="text" value="{{ $empresa->cnpj ?? '' }}" name="cnpj" class='form-control'>

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Site</span>
                                        </div>

                                        <input type="text" name="site" class="form-control" value="{{ $empresa->site ?? '' }}" required>

                                        </div>

                                    </div>

                                    <div class="input-group m-3">

                                    <button type="button" class="btn btn-secondary m-2" onclick="window.location = '{{url('empresa')}}'">
                                        <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Voltar">
                                        Voltar </button>

                                    <button class=" btn btn-success m-2" onclick="">
                                        <img src="{{ asset('img/add-list.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Salvar">
                                        Salvar </button>
                                    </form>

                                    <form action="{{ url('/empresa/' . $empresa->id) }}" method="POST"
                                        onsubmit="return confirm('Confirma Exclusão da Empresa?');" >
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <button type="submit" class="btn btn-danger m-2" value="X" title="Excluir Empresa" >
                                                <img src="{{ asset('img/007-excluir.svg') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Excluir">
                                                Excluir Empresa
                                            </button>
                                    </form>

                                </div>

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
