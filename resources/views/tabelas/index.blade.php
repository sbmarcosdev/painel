@extends('layouts.app')

@section('content')
<div class="container">
  
            <div class="card">
                <div class="card-header"><h4 class="tituloPrincipal">Controle de Integrações</h4></div>

                <div class="card-body">
                    <h5>Tabelas</h5>                
                      <div class="table-responsive">
                             <table id="table" name="table" class="table table-striped table-bordered" style="font-size:1.9vh;">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Descrição </th>
                                        <th>Ação </th>
                                    </tr>
                                </thead> 
                                 <tbody>
                                    @forelse($tabelas as $tabela)
                                    <tr>
                                        <td>{{$tabela->id }}</td>
                                        <td>{{$tabela->descricao_tabela }}</td>
                                        <td>
                                        <button title="Visualizar Tabela" class="btn btn-outline-success btn-sm" onclick="window.location='{{url('tabelas/'.$tabela->id )}}'">  
                                        <img src="{{ asset('img/documentos.svg') }}" width="12" data-toggle="tooltip" data-placement="bottom"> </button>
                                        <button title="Editar Tabela" class="btn btn-outline-primary btn-sm" onclick="window.location='{{url('tabelas/'.$tabela->id.'/edit')}}'">  
                                        <img src="{{ asset('img/001-editar.svg') }}" width="12" data-toggle="tooltip" data-placement="bottom"> </button>
                                        </td>                                        
                                   </tr>
                                    @empty
                                    @endforelse
                                </tbody> 
                            </table>
                    </div>

                    <button title="Nova Tabela" class="btn btn-outline-secondary" onclick="window.location='{{url('tabelas/create')}}'">  
                                           Incluir <img src="{{ asset('img/documentos.svg') }}" width="15" data-toggle="tooltip" data-placement="bottom"> </button>

                </div>
            </div>


</div>

@endsection
