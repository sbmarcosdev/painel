@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5> {{ $tabela->empresa()->nome }} - {{ $tabela->descricao_tabela }} </h5>
        </div>

            <form action="#" method="POST">
                @csrf
                <div class="card-body">
                    <h5 class="m-2"> Edição Tabela </h5>
                    <div class="input-group p-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Id Tabela</span>
                        </div>
                        <input type="text" name='tabela_id' value="{{ $tabela->id ?? '' }}" class='form-control' readonly>
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nome da Tabela</span>
                        </div>
                        <input type="text" id='descricao_tabela' value="{{ $tabela->descricao_tabela ?? '' }}" onchange="jsSaveTabela()" class='form-control' required>
                        <span id="ok" class="input-group-text">OK</span>
                    </div>


                <div class="input-group p-2">
                    <h5> Edição de Colunas </h5>
                    <table id="table" name="table" class="table table-striped table-bordered" style="font-size:1.9vh;">
                        <thead>
                            <tr>
                                <th>Id </th>
                                <th>Descrição </th>
                                <th>Ordem </th>
                                <th>Ação </th>
                            </tr>
                        </thead>
                        <tbody data-id="{{ $tabela->id }}" class="sortable">
                            @forelse($colunas as $coluna)
                                <tr data-id="{{ $coluna->id ?? '' }}" class="pergunta" title="Arraste para ordenar">

                                    <td>{{ $coluna->id }}</td>
                                    <td>{{ $coluna->nome_coluna }}</td>
                                    <td class="position"><a>{{ $coluna->ordem ?? '' }}</a></td>

                                    <td> <button type="button" title="Editar Coluna"
                                            class="btn btn-outline-secondary btn-sm"
                                            onclick="window.location='{{ url('colunas/' . $coluna->id . '/edit') }}'">
                                            <img src="{{ asset('img/001-editar.svg') }}" width="12"
                                                data-toggle="tooltip" data-placement="bottom">
                                        </button>

                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </form>

            <div class="input-group p-1">
                <button type="button" class="btn btn-outline-secondary m-2" onclick="window.location ='{{ url('tabelas') }}'">
                    <img src="{{ asset('img/arrow-back.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Voltar">
                    Voltar
                </button>

                @if (sizeof($colunas) < 20)
                    <button type="button" class=" btn btn-outline-success m-2" onclick="window.location = '{{ url('nova-coluna/' . $tabela->id) }}'">
                        <img src="{{ asset('img/add-list.png') }}" width="15" data-toggle="tooltip" data-placement="bottom" title="Nova Coluna">
                        Incluir Coluna </button>
                @endif

                <form action="{{ url('/tabelas/' . $tabela->id) }}" method="POST"
                    onsubmit="return confirm('Confirma Exclusão da Tabela?');">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <button type="submit" class="btn btn-outline-success m-2" value="X" title="Excluir Tabela">
                        <img src="{{ asset('img/007-excluir.svg') }}" width="15" data-toggle="tooltip"
                            data-placement="bottom" title="Excluir">
                        Excluir Tabela
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
function jsSaveTabela(){

    var token = $('input[name="_token"]').val();
    var descricao_tabela = $('#descricao_tabela').val();

     $.ajax({
             url: "{{ url('/tabelas/' . $tabela->id) }}",
             type: 'patch',
             data:{"_token":token,"descricao_tabela":descricao_tabela}
         });
}

function sendReorderPerguntasRequest($category) {

var _token = $('input[name="_token"]').val();

var items = $category.sortable('toArray', {
    attribute: 'data-id'
});
var ids = $.grep(items, (item) => item !== "");

if ($category.find('tr.pergunta').length) {
    $category.find('.empty-message').hide();
}
$category.find('.category-name').text($category.find('tr:first td').text());

$.post("{{ route('admin.colunas.reorder') }}", {
        _token,
        ids,
        category_id: $category.data('id')
    })
    .done(function(response) {
        $category.children('tr.pergunta').each(function(index, pergunta) {
            $(pergunta).children('.position').text(response.positions[$(pergunta).data('id')])
        });
    })
    .fail(function(response) {
        alert('Error occured while sending reorder request');
        location.reload();
    });
}

$(document).ready(function() {
var $categories = $('table');
var $perguntas = $('.sortable');

$perguntas.sortable({
    connectWith: '.sortable',
    items: 'tr.pergunta',
    stop: (event, ui) => {
        sendReorderPerguntasRequest($(ui.item).parent());

        if ($(event.target).data('id') != $(ui.item).parent().data('id')) {
            if ($(event.target).find('tr.pergunta').length) {
                sendReorderPerguntasRequest($(event.target));
                console.log($(event.target));
            } else {
                $(event.target).find('.empty-message').show();
            }
        }
    }
});
$('table, .sortable').disableSelection();
});

</script>
@endsection
