@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container espacamento">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="col-sm-12">
                            <h4 class="tituloPrincipal">Tabela {{ $tabela->descricao_tabela }} </h4>

                            <form id="uploadForm" action="{{url('/tabelas/'.$tabela->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group mt-2">
                                <div class="card p-4">

                                <p> Colunas </p>
                                 <div class="input-group m-2">

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
                                        <td>        <button type="button" title="Editar Coluna" class="btn btn-outline-secondary btn-sm" onclick="window.location='{{url('colunas/'.$coluna->id.'/edit')}}'">
                                            <img src="{{ asset('img/001-editar.svg') }}" width="12" data-toggle="tooltip" data-placement="bottom"> </button>
                                            </form>

                                            {{-- <form action="{{url('colunas/'.$coluna->id )}}" method="POST" onsubmit="return confirm('{{ trans('Confirma Exclusão desta Coluna?') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" title="Excluir">
                                                    <img src="{{ asset('img/007-excluir.svg') }}" width="12" data-toggle="tooltip" data-placement="bottom" title="Excluir Coluna">
                                                </button>
                                            </form> --}}
                                        </td>
                                   </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>

                                    </div>

                                    <div class="input-group m-3">

                                    <button type="button" class="btn btn-secondary m-2" onclick="window.location ='{{ url('/tabelas/' . $tabela->id) }}'">
                                        <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Voltar">
                                        Voltar </button>


                                    @if ( sizeof($colunas) < 20 )
                                    <button type="button" class=" btn btn-success m-2" onclick="window.location = '{{url('nova-coluna/'. $tabela->id )}}'">
                                        <img src="{{ asset('img/add-list.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Nova Coluna">
                                        Incluir Coluna </button>
                                    @endif

                                        <form action="{{ url('/tabelas/' . $tabela->id) }}" method="POST"
                                           onsubmit="return confirm('Confirma Exclusão da Tabela?');" >
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <button type="submit" class="btn btn-danger m-2" value="X" title="Excluir Tabela" >
                                                <img src="{{ asset('img/007-excluir.svg') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Excluir">
                                                Excluir Tabela
                                            </button>
                                        </form>

                                </div>

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
