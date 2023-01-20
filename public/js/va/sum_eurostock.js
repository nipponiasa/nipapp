$(document).ready(function() {

    $('#table_stock').DataTable({

        "dom": 'Bfrtip',
        "bInfo" : false,
        "paging": false,
        "buttons": ['excel','pdf'],
        "order": [[2, 'desc']],



    "fnDrawCallback": function ( row, data, start, end, display ) {
              var api = this.api(), data;
   
              // Remove the formatting to get integer data for summation
              var intVal = function ( i ) {
                  return typeof i === 'string' ?
                      i.replace(/[\$,]/g, '')*1 :
                      typeof i === 'number' ?
                          i : 0;
              };
              // Total over all pages
              total = api
                  .column( 2 )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
   
              // Total over this page
              pageTotal = api
                  .column( 2, { page: 'current'} )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );


                  $('#total_sum').html(pageTotal );

          }
      });
  });
  