@extends('layouts.app')

@section('content')
<div class="container">

            <div class="card">
                <div class="card-header"><h4 class="tituloPrincipal">Controle de Integrações</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- <h5>Empresa: {{  $empresa->nome }}</h5>

                    <p>CNPJ: {{  $empresa->cnpj }}</p> --}}

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
                                     @foreach ( $results as $r )
                                    <tr>
                                        <td rowspan="2" class="align-middle">{{ $r['p']->tabela()->descricao_tabela  }}</td>
                                        <td rowspan="2" class="align-middle">{{ $r['p']->data }}</td>
                                        <td>{{ $r['p']->inicio }}</td>
                                        <td>{{ $r['p']->termino }}</td>
                                        <td>{{ $r['p']->ciclo }}</td>
                                        <td>{{ $r['p']->tempo_ultimo }}</td>
                                        <td rowspan="2" class="align-middle">
                                            <button title="Relatório" class="btn btn-primary" onclick="window.location='{{url('fatura')}}'">
                                            <img src="{{ asset('img/grafico.svg') }}" width="15" data-toggle="tooltip" data-placement="bottom"> </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ $r['u']->inicio }}</td>
                                        <td>{{ $r['u']->termino }}</td>
                                        <td>{{ $r['u']->ciclo }}</td>
                                        <td>{{ $r['u']->tempo_ultimo }}</td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>



</div>

@endsection
