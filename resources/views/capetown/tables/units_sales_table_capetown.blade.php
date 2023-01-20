                                  
<x-adminlte-datatable id="table_invoices" :heads="$heads_motos" :config="$config"  striped>
@php
 
                                            $real_invoiced=0;
                                            $target=0;
                                          
foreach($total_sales_per_month as $result=>$key) {
       echo '<tr><td>'.$result.'</td><td >'.$key.'</td></tr>';
       $real_invoiced+=$key;
 
}

echo '<tfoot><tr><td>Total</td><td style="text-align: right;" >'.$real_invoiced.'</td></tr></tfoot>';


@endphp
                                           
                                           
</x-adminlte-datatable>
                           






 