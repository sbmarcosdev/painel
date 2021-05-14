@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <h5 class="tituloPrincipal">Usuários</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                    <table id="table" name="table" class="table table-striped table-bordered" style="font-size:1.9vh">
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
                                <button type="button" title="Editar" class="btn btn-outline-secondary btn-sm" onclick="window.location='{{url('usuarios/'.$user->id.'/edit')}}'">
                                    <img src="{{ asset('img/001-editar.svg') }}" width="12" data-toggle="tooltip" data-placement="bottom">
                                </button>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>

                <button type="button" class="btn btn-outline-secondary m-2" onclick="window.location = '{{url('home')}}'">
                    <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Voltar">
                    Voltar
                </button>

                {{-- <button class=" btn btn-success m-2"  onclick="window.location = '{{url('usuarios/create')}}'">
                    <img src="{{ asset('img/add-list.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Salvar">
                    Incluir Usuário
                </button> --}}

        </div>
    </div>
</div>

@endsection
