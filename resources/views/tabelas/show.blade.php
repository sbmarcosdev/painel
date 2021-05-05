@extends('layouts.app')

@section('content')
<div class="container">

            <div class="card">
                <div class="card-header"><h4 class="tituloPrincipal">Controle de Integrações</h4></div>

                <div class="card-body">

                    <h5>{{  $tabelas->descricao_tabela ?? '' }}</h5>

                    <div class="table-responsive">

                             <table id="showtable" name="table" class="table table-striped table-bordered" style="font-size:1.9vh;">
                                <thead>
                                    <tr>
                                    @forelse($colunas as $coluna)
                                        <th>{{ $coluna->nome_coluna }} </th>
                                    @empty
                                    @endforelse
                                    </tr>
                                </thead>


                                 <tbody>
                                    @forelse($regs as $reg)
                                    <tr>
                                        @forelse($colunas as $key => $coluna)
                                         <td>{{ $reg['coluna_'.str_pad($key + 1, 2, '0', STR_PAD_LEFT) ] }}</td>
                                         @empty
                                        @endforelse
                                   </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                    </div>
                    <button type="button" class="btn btn-secondary m-2" onclick="history.back()">
                                        <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Voltar">
                                        Voltar
                                    </button>
                </div>
            </div>


</div>
@endsection

