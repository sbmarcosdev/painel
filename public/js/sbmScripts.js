if ($('#admin').val() == 'S') {
    $('#op2').prop("selected", true);
}

$('#empr' + $('#empresa_id').val()).prop("selected", true);

$(document).ready(function () {
    $('#showtable').DataTable({
        dom: 'Bfrtip',
        buttons: ['csvHtml5'],
        responsive: true,
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            "select": {
                "rows": {
                    "_": "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                }
            }
        }
    })
})

function jsShowTab(empr) {
    $.ajax({
        url: '/tabs-empresa/' + empr,
        type: "get",
        dataType: 'json',
        success: function (arrayTabelas) {
            arrayTabelas.forEach(jsShowItem);
        }
    })
}

function jsShowItem(item) {
    local = '/tab-ajax/' + item;
    $.ajax({
        url: local,
        type: "get",
        success: function (response) {
            $('#tb' + item).html(response);
        }
    })
}
