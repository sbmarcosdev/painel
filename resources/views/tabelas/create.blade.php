@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Tabela </h5>
            </div>

            <form id="uploadForm" action="{{ url('tabelas') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')

                <div class="card-body">

                    <div class="input-group p-4">

                        <div class="input-group-prepend">
                            <span class="input-group-text">Empresa</span>
                        </div>

                        <select type="select" name='empresa_id' class='form-control'>
                            @foreach ($empresas as $empresa)
                                <option id="empr{{ $empresa->id }}" value="{{ $empresa->id }}">
                                    {{ $empresa->nome }} </option>
                            @endforeach
                        </select>
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nome da Tabela</span>
                        </div>

                        <input type="text" name="descricao_tabela" class="form-control" required>

                    </div>

                    <div class="input-group m-3">

                        <button type="button" class="btn btn-outline-secondary m-1"
                            onclick="window.location = '{{ url('tabelas') }}'">
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

@section('scripts')

    <script>
        function jsCorPrimaria() {
            $('#cor1').val($('#inputcolor').val());
        }

    </script>
@endsection
