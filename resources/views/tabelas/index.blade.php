@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                <h5 class="tituloPrincipal">Tabelas</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" name="table" class="table table-striped table-bordered" style="font-size:1.9vh;">
                        <thead>
                            <tr>
                                <th>Empresa</th>
                                <th>Descrição </th>
                                <th>Ação </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tabelas as $tabela)
                                <tr>
                                    <td>{{ $tabela->empresa()->nome ?? '' }}</td>
                                    <td>{{ $tabela->descricao_tabela }}</td>
                                    <td>
                                        <button title="Visualizar Tabela" class="btn btn-outline-success btn-sm"
                                            onclick="window.location='{{ url('tabelas/' . $tabela->id) }}'">
                                            <img src="{{ asset('img/documentos.svg') }}" width="12" data-toggle="tooltip"
                                                data-placement="bottom"> </button>
                                        @if (Auth::user()->admin == 'S')
                                            <button title="Editar Tabela" class="btn btn-outline-secondary btn-sm"
                                                onclick="window.location='{{ url('tabelas/' . $tabela->id . '/edit') }}'">
                                                <img src="{{ asset('img/001-editar.svg') }}" width="12"
                                                    data-toggle="tooltip" data-placement="bottom"> </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <button type="button" class="btn btn-outline-secondary m-2"
                    onclick="window.location='{{ url('tabelas') }}'">
                    <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip" data-placement="bottom"
                        title="Voltar">
                    Voltar
                </button>

                @if (Auth::user()->admin == 'S')
                    <button title="Nova Tabela" class="btn btn-outline-success"
                        onclick="window.location='{{ url('nova-tabela/create') }}'">
                        <img src="{{ asset('img/add-list.png') }}" width="15" data-toggle="tooltip"
                            data-placement="bottom">
                        Incluir Nova Tabela
                    </button>
                @endif
            </div>
        </div>
    </div>


@endsection
