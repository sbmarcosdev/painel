@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container espacamento">
        <h4 class="tituloPrincipal">Usuários</h4>
        <div class="form-group mt-3">
            <div class="card p-4">
                <div class="input-group m-3">
                    <table id="table" name="table" class="table table-striped table-bordered" style="font-size:1.9vh;">
                    <thead>
                        <tr>
                            <th>Id </th>
                            <th>Descrição </th>
                            <th>Empresa </th>
                            <th>Tipo </th>
                            <th>Ação </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->empresa()->nome ?? '' }}</td>
                            <td>@if( $user->admin == 'S') Admin @else Padrão @endif</td>
                            <td>
                                <button type="button" title="Editar" class="btn btn-primary" onclick="window.location='{{url('usuarios/'.$user->id.'/edit')}}'">
                                    <img src="{{ asset('img/001-editar.svg') }}" width="15" data-toggle="tooltip" data-placement="bottom">
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

                <button class=" btn btn-success m-2"  onclick="window.location = '{{url('usuarios/create')}}'">
                    <img src="{{ asset('img/add-list.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Salvar">
                    Incluir Usuário
                </button>
            </div>
            </div>
    </div>
</div>
@endsection
