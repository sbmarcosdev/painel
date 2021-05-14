@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Empresa</h5>
            </div>
            <div class="card-body">
                <form action="{{ url('empresa') }}" method="POST" enctype="form-data">
                    @csrf
                    @method('post')
                    <div class="input-group p-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nome Fantasia</span>
                        </div>
                        <input type="text" name='nome' class='form-control' required>

                        <div class="input-group-prepend">
                            <span class="input-group-text">Razão Social</span>
                        </div>

                        <input type="text" name="razao_social" class="form-control">
                    </div>
                    <div class="input-group p-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">CNPJ</span>
                        </div>
                        <input type="text" name="cnpj" class='form-control'>

                        <div class="input-group-prepend">
                            <span class="input-group-text">Site</span>
                        </div>
                        <input type="text" name="site" class="form-control">
                    </div>

                    <div class="input-group p-2">
                        <button type="button" class="btn btn-outline-secondary m-2"
                            onclick="window.location = '{{ url('empresa') }}'">
                            <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip"
                                data-placement="bottom" title="Voltar">
                            Voltar </button>

                        <button class=" btn btn-outline-success m-2" onclick="">
                            <img src="{{ asset('img/add-list.png') }}" width="15" data-toggle="tooltip"
                                data-placement="bottom" title="Salvar">
                            Salvar </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
