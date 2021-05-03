@extends('layouts.app')

@section('content')
<div class="container">

            <div class="card">
                <div class="card-header"><h4 class="tituloPrincipal">Controle de Integrações</h4></div>

                <div class="card-body">
                    <div class="table-responsive">

                             <table id="table" name="table" class="table table-striped table-bordered" style="font-size:1.9vh;">
                                <thead>
                                    <tr>
                                        <th>Tabela</th>
                                        <th>Data</th>
                                        <th>Início</th>
                                        <th>Término</th>
                                        <th>Tempo ciclo</th>
                                        <th>Tempo desde último ciclo (em minutos)</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>


                                 <tbody>
                                    @forelse($regs as $reg)
                                    <tr>
                                        <td>{{ $reg->tabela()->descricao_tabela }}</td>
                                        <td>{{ $reg->data }}</td>
                                        <td>{{ $reg->inicio }}</td>
                                        <td>{{ $reg->termino }}</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td>
                                            <button title="Relatório" class="btn btn-primary" onclick="window.location='{{url('fatura')}}'">
                                            <img src="{{ asset('img/grafico.svg') }}" width="15" data-toggle="tooltip" data-placement="bottom"> </button>

                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>



</div>

@endsection
