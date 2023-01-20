                                  
<x-adminlte-datatable id="table_invoices" :heads="$heads_motos" :config="$config"   striped>
@php
 
                                            $real_invoiced=0;
                                            $target=0;
                                          
foreach($total_sales_per_warehouse as $moto_sale) {
       echo '<tr><td>'.$moto_sale->ArticuloDescripcion.'</td><td >'.$moto_sale->athroisma.'</td></tr>';
       $real_invoiced+=$moto_sale->athroisma;
 
}

echo '<tfoot><tr><td>Total</td><td style="text-align: right;" >'.$real_invoiced.'</td></tr></tfoot>';


@endphp
                                           
                                           
</x-adminlte-datatable>
                           






 