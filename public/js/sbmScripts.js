
if ($('#admin').val() == 'S'){
    $('#op2').prop("selected", true);
}

$('#empr' + $('#empresa_id').val()).prop("selected", true);


$(document).ready( function () {

 var table = $('#showtable').DataTable({
  "footerCallback": function(row, data, start, end, display) {
    var api = this.api();
    api.columns(3, {
      page: 'current'
    }).every(function() {
      var sum = this
      .nodes()
      .reduce(function(a, b) {
        var x = parseFloat(a) || 0;
        var y = parseFloat($(b).text()) || 0;

        console.log($(b).text());

        return x + y;
      }, 0);
      $(this.footer()).html(sum);
    });

                    var api = this.api();
                        api.columns(2, {
                                     page: 'current'
                                    }).every(function() {
                        var sum = this
                        .nodes()
                        .reduce(function(a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat($(b).text()) || 0;

                            console.log($(b).text());

                            return x + y;
                        }, 0);
                        $(this.footer()).html(sum);
                        });
  }

    })
  });
