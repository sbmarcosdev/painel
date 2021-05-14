@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Usuário</h5>
            </div>
            <div class="card-body">

                <form action="{{ url('/usuarios/' . $user->id) }}" method="POST">
                    @csrf
                    @method('patch')

                    <div class="input-group p-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Usuário</span>
                        </div>
                        <input type="text" name='name' value="{{ $user->name ?? '' }}" class='form-control' required>

                        <div class="input-group-prepend">
                            <span class="input-group-text">E-mail</span>
                        </div>

                        <input type="text" class="form-control" value="{{ $user->email ?? '' }}" readonly>
                    </div>

                    <div class="input-group p-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Empresa</span>
                        </div>

                        <input type="hidden" id="empresa_id" value="{{ $user->empresa_id }}">

                        <select name="empresa_id" class="form-control" required>
                            <option value="" disabled>Selecione Empresa</option>
                            @foreach ($empresas as $empresa)
                                <option id="empr{{ $empresa->id }}" value="{{ $empresa->id }}">{{ $empresa->nome }}
                                </option>
                            @endforeach
                        </select>

                        <div class="input-group-prepend">
                            <span class="input-group-text">Tipo</span>
                        </div>

                        <input type="hidden" id="admin" value="{{ $user->admin }}">

                        <select id="userRole" name="admin" class="form-control">
                            <option id="op1" value="">Usuário Padrão</option>
                            <option id="op2" value="S">Administrador</option>
                        </select>
                    </div>


                    <div class="input-group p-2">
                        <button type="button" class="btn btn-outline-secondary m-2" onclick="history.back()">
                            <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip"
                                data-placement="bottom" title="Voltar">
                            Voltar
                        </button>

                        <button class="btn btn-outline-success m-2">
                            <img src="{{ asset('img/add-list.png') }}" width="15" data-toggle="tooltip"
                                data-placement="bottom" title="Salvar">
                            Salvar
                        </button>

                        </form>


                        <form action="{{ url('/usuarios/' . $user->id) }}" method="POST"
                            onsubmit="return confirm('{{ trans('Confirma Exclusão?') }}');">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type="submit" class="btn btn-outline-success m-2" value="X" title="Excluir">
                                <img src="{{ asset('img/007-excluir.svg') }}" width="15" data-toggle="tooltip"
                                    data-placement="bottom" title="Excluir">
                                Excluir
                            </button>
                        </form>

                    </div>
        </div>
    </div>

@endsection
