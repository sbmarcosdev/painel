@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container espacamento">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="col-sm-12">
                            <h4 class="tituloPrincipal">Tabela</h4>

                            <form id="uploadForm" action="{{url('/tabelas/'.$tabela->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group mt-3">
                                <div class="card p-4">
                                 <div class="input-group m-3">
                                  
                                 <table id="table" name="table" class="table table-striped table-bordered" style="font-size:1.9vh;">
                                <thead>
                                    <tr>
                                        <th>Id </th>
                                        <th>Descrição </th>
                                        <th>Ação </th>
                                    </tr>
                                </thead> 
                                 <tbody>
                                    @forelse($colunas as $coluna)
                                    <tr>
                                        <td>{{$coluna->id }}</td>
                                        <td>{{$coluna->nome_coluna }}</td>
                                        <td>        <button type="button" title="Editar" class="btn btn-primary" onclick="window.location='{{url('colunas/'.$tabela->id.'/edit')}}'">  
                                            <img src="{{ asset('img/001-editar.svg') }}" width="15" data-toggle="tooltip" data-placement="bottom"> </button>

                                       
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
                                        Voltar </button>

                                    <button class=" btn btn-success m-2" onclick="">
                                        <img src="{{ asset('img/add-list.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Salvar">
                                        Salvar </button>

                                </div>
                            </form>
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