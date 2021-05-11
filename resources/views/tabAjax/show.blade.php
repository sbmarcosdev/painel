<div class="card">
    <div class="card-header">
        <h5>{{ $tabelas->descricao_tabela ?? '' }}</h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="tabAjax{{ $tabelas->id }}" name="table" class="table table-striped table-bordered" style="font-size:1.9vh;">
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
                                <td>{{ $reg[$key + 1] }}</td>
                            @empty
                            @endforelse
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>

$(document).ready(function () {



    $('#tabAjax'+{{ $tabelas->id }}).DataTable({
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
</script>
