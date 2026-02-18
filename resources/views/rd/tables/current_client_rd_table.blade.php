<x-adminlte-datatable id="table_invoices" :heads="$heads_client_current" :config="$configsales"  striped>
@php
$total_t_2023=0;
$total_t_2024=0;
$total_t_2025=0;
$total_t_2026=0;


$total_u_2023=0;
$total_u_2024=0;
$total_u_2025=0;
$total_u_2026=0;

$total_t=0;
$total_u=0;

$g_total_t=0;
$g_total_u=0;
                                 
foreach($sales_table as $sale=>$key) {


//rows totals
$total_t=(array_key_exists('2023',$key)?$key[2023]['t']:0)+(array_key_exists('2024',$key)?$key[2024]['t']:0)+(array_key_exists('2025',$key)?$key[2025]['t']:0)+(array_key_exists('2026',$key)?$key[2026]['t']:0);
$total_u=(array_key_exists('2023',$key)?$key[2023]['u']:0)+(array_key_exists('2024',$key)?$key[2024]['u']:0)+(array_key_exists('2025',$key)?$key[2025]['u']:0)+(array_key_exists('2026',$key)?$key[2026]['u']:0);
$g_total_t+=$total_t;
$g_total_u+=$total_u;

//rows totals

$total_t_2023+=(array_key_exists('2023',$key)?$key[2023]['t']:0);
$total_t_2024+=(array_key_exists('2024',$key)?$key[2024]['t']:0);
$total_t_2025+=(array_key_exists('2025',$key)?$key[2025]['t']:0);
$total_t_2026+=(array_key_exists('2026',$key)?$key[2026]['t']:0);

$total_u_2023+=(array_key_exists('2023',$key)?$key[2023]['u']:0);
$total_u_2024+=(array_key_exists('2024',$key)?$key[2024]['u']:0);
$total_u_2025+=(array_key_exists('2025',$key)?$key[2025]['u']:0);
$total_u_2026+=(array_key_exists('2026',$key)?$key[2026]['u']:0);




$total_u=(array_key_exists('2023',$key)?$key[2023]['u']:0)+(array_key_exists('2024',$key)?$key[2024]['u']:0)+(array_key_exists('2025',$key)?$key[2025]['u']:0)+(array_key_exists('2026',$key)?$key[2026]['u']:0);




echo '<tr>              
       <td>'.$sale.'</td>
       <td >'.number_format((array_key_exists('2023',$key)?$key[2023]['t']:0),2).'$</td>
       <td ><h5><span style="width:40px;" class="badge badge-info">'.(array_key_exists('2023',$key)?$key[2023]['u']:0).'</span></h5></td>
       <td >'.number_format((array_key_exists('2024',$key)?$key[2024]['t']:0),2).'$</td>
       <td ><h5><span style="width:40px;" class="badge badge-info">'.(array_key_exists('2024',$key)?$key[2024]['u']:0).'</span></h5></td>
       <td >'.number_format((array_key_exists('2025',$key)?$key[2025]['t']:0),2).'$</td>
       <td ><h5><span style="width:40px;" class="badge badge-info">'.(array_key_exists('2025',$key)?$key[2025]['u']:0).'</span></h5></td>
       <td >'.number_format((array_key_exists('2026',$key)?$key[2026]['t']:0),2).'$</td>
       <td ><h5><span style="width:40px;" class="badge badge-info">'.(array_key_exists('2026',$key)?$key[2026]['u']:0).'</span></h5></td>
       <td >'.number_format($total_t,2).'$</td>
       <td><h5><span style="width:40px;" class="badge badge-info">'.$total_u.'</span></h5></td>
      </tr>';

   
 
}

echo '<tfoot><tr>
       <td>Totals</td>
       <td>'.number_format($total_t_2023,2).'$</td>
       <td><h5><span style="width:40px;" class="badge badge-info">'.$total_u_2023.'</span></h5></td>
       <td>'.number_format($total_t_2024,2).'$</td>
       <td><h5><span style="width:40px;" class="badge badge-info">'.$total_u_2024.'</span></h5></td>
       <td>'.number_format($total_t_2025,2).'$</td>
       <td><h5><span style="width:40px;" class="badge badge-info">'.$total_u_2025.'</span></h5></td>
       <td>'.number_format($total_t_2026,2).'$</td>
       <td><h5><span style="width:40px;" class="badge badge-info">'.$total_u_2026.'</span></h5></td>
       <td><b>'.number_format($g_total_t,2).'$</b></td>
       <td><h5><span style="width:40px;" class="badge badge-info">'.$g_total_u.'</span></h5></td>
       </tr></tfoot>';


@endphp
                                           
                                           
</x-adminlte-datatable>
                           




 