
<x-adminlte-datatable id="table_pending_invoices" :heads="$heads_client_pending_sales_current" :config="$config"  striped>
@php
 
$order_value_total=0;
$units_total=0;
                                     
foreach($pen_sales as $pen_sale) {
       echo '<tr>
       <td>'.$pen_sale->order_code.'</td>
       <td>'.$pen_sale->moto_descr.'</td>
       <td>'.$pen_sale->units.'</td>
       <td>'.number_format($pen_sale->order_value,2).'$</td>
       <td>'.$pen_sale->date_fortosi.'</td>
       <td>'.$pen_sale->date_afixi.'</td>
       <td>'.$pen_sale->year_sold.'</td>';
       $order_value_total+=$pen_sale->order_value;
       $units_total+=$pen_sale->units;
}

echo '<tfoot><tr><td>Total</td><td></td><td>'.$units_total.'</td><td>'.number_format($order_value_total,2).'$</td><td></td><td></td><td></td></tr></tfoot>';


@endphp
                                           
                                           
</x-adminlte-datatable>
                           




 