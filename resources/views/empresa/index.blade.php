@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container espacamento">
        <h4 class="tituloPrincipal">Empresas</h4>
        <div class="form-group mt-3">
            <div class="card p-4">
                <div class="input-group m-3">
                    <table id="table" name="table" class="table table-striped table-bordered" style="font-size:1.9vh;">
                    <thead>
                        <tr>
                            <th>Id </th>
                            <th>Nome </th>
                            <th>Razão Social </th>
                            <th>CNPJ </th>
                            <th>Site </th>
                            <th>Ação </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->id }}</td>
                            <td>{{ $empresa->nome }}</td>
                            <td>{{ $empresa->razao_social ?? '' }}</td>
                            <td>{{ $empresa->cnpj ?? '' }} </td>
                            <td>{{ $empresa->site ?? '' }} </td>
                            <td>
                                <button type="button" title="Editar" class="btn btn-outline-primary btn-sm" onclick="window.location='{{url('empresa/'.$empresa->id.'/edit')}}'">
                                    <img src="{{ asset('img/001-editar.svg') }}" width="12" data-toggle="tooltip" data-placement="bottom">
                                </button>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="input-group m-3">
                <button type="button" class="btn btn-secondary m-2" onclick="window.location = '{{url('home')}}'">
                    <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Voltar">
                    Voltar
                </button>

                <button class=" btn btn-success m-2"  onclick="window.location = '{{url('empresa/create')}}'">
                    <img src="{{ asset('img/add-list.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Novo">
                    Incluir Empresa
                </button>
            </div>
            </div>
    </div>
</div>
@endsection
