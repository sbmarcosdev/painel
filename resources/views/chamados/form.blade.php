@extends('layouts.app')
@include('msg_erros')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Abertura de Chamado</h5>
            </div>
            <div class="card-body">

                <form action="{{ url('enviar-chamado') }}" method="POST" enctype="form-data">
                    @csrf
                    @method('post')

                    {{-- <div class="input-group p-3">

                        <div class="input-group-prepend">
                            <span class="input-group-text">Nome Fantasia</span>
                        </div>
                        <input type="text" name='nome' value="{{ $empresa->nome ?? '' }}" class='form-control' readonly>

                        <div class="input-group-prepend">
                            <span class="input-group-text">CNPJ</span>
                        </div>
                        <input type="text" value="{{ $empresa->cnpj ?? '' }}" name="cnpj" class='form-control' readonly>

                    </div> --}}
                    <div class="input-group p-3">

                        <div class="input-group-prepend">
                            <span class="input-group-text">E-mail Solicitante</span>
                        </div>
                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email ?? '' }}" readonly>

                        <div class="input-group-prepend">
                            <span class="input-group-text">E-mail Cópia</span>
                        </div>

                        <input type="hidden" name="name" value="{{ Auth::user()->name ?? '' }}">

                        <input type="email" name="emailcc" class="form-control" value="{{ $request->emailcc ?? '' }}" >
                    </div>

                    <div class="input-group p-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Assunto</span>
                        </div>
                        <input type="text" name="assunto" class="form-control" value="{{ $request->assunto ?? '' }}" required>
                    </div>

                    <div class="input-group p-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Descreva sua solicitação</span>
                        </div>

                        <textarea rows="6" cols="70" name="texto" required>{{ $request->texto ?? '' }}</textarea>

                        {{-- <textarea name="texto" class='form-control' rows="5" required="required"> {{ $request->texto ?? '' }} </textarea> --}}

                    </div>


                    <div class="input-group p-2">

                        <button type="button" class="btn btn-outline-secondary m-2"
                            onclick="window.location = '{{ url('home') }}'">
                            <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip"
                                data-placement="bottom" title="Voltar">
                            Voltar </button>

                        <button class=" btn btn-outline-success m-2"  title="Registrar Chamado">
                            <img src="{{ asset('img/add-list.png') }}" width="15" data-toggle="tooltip"
                                data-placement="bottom" >
                            Enviar </button>
                </form>

            </div>

        </div>
    </div>

@endsection
