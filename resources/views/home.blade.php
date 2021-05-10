@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="p-1">
            <div class="card">
                <div class="card-header">
                    <h5>Controle de Integrações</h5>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="table" name="table" class="table table-bordered" style="font-size:1.9vh;">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Data</th>
                                    <th>Início</th>
                                    <th>Término</th>
                                    <th>Tempo ciclo</th>
                                    <th>Tempo desde último ciclo</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $r)
                                    <tr>
                                        <td rowspan="2" class="align-middle">{{ $r['p']->tabela()->descricao_tabela }}
                                        </td>
                                        <td rowspan="2" class="align-middle">
                                            {{ Carbon\Carbon::parse($r['p']->data)->format('d/m/Y') }}</td>
                                        <td>{{ $r['p']->inicio }}</td>
                                        <td>{{ $r['p']->termino }}</td>
                                        <td>{{ $r['p']->ciclo }}</td>
                                        <td>{{ $r['p']->tempo_ultimo }}</td>
                                        <td rowspan="2" class="align-middle text-center">
                                            <button title="Visualizar Dados" class="btn btn-outline-success btn-sm"
                                                onclick="window.location='{{ url('tabelas/' . $r['p']->tabela()->id) }}'">
                                                <img src="{{ asset('img/documentos.svg') }}" width="12"
                                                    data-toggle="tooltip" data-placement="bottom"> </button>
                                            @if (Auth::user()->admin == 'S')
                                                <button title="Editar Tabela" class="btn btn-outline-primary btn-sm"
                                                    onclick="window.location='{{ url('tabelas/' . $r['p']->tabela()->id . '/edit') }}'">
                                                    <img src="{{ asset('img/001-editar.svg') }}" width="12"
                                                        data-toggle="tooltip" data-placement="bottom"> </button>
                                            @endif

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ $r['u']->inicio }}</td>
                                        <td>{{ $r['u']->termino }}</td>
                                        <td>{{ $r['u']->ciclo }}</td>
                                        <td>{{ $r['u']->tempo_ultimo }}  </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($results as $r)
            <section id="tb{{ $r['p']->tabela()->id }}" class="p-1"></section>
        @endforeach
    </div>

    <body onload="jsShowTab( {{ Auth::user()->empresa_id }} )">
    </body>
@endsection
