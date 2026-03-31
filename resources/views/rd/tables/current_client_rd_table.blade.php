<x-adminlte-datatable id="table_invoices" :heads="$heads_client_current" :config="$configsales"  striped>
@php
$years = [$current_year - 3, $current_year - 2, $current_year - 1, $current_year];

$total_t = array_fill_keys($years, 0);
$total_u = array_fill_keys($years, 0);

$g_total_t = 0;
$g_total_u = 0;

foreach($sales_table as $sale => $key) {

    $row_t = 0;
    $row_u = 0;
    foreach($years as $year) {
        $row_t += array_key_exists($year, $key) ? $key[$year]['t'] : 0;
        $row_u += array_key_exists($year, $key) ? $key[$year]['u'] : 0;
        $total_t[$year] += array_key_exists($year, $key) ? $key[$year]['t'] : 0;
        $total_u[$year] += array_key_exists($year, $key) ? $key[$year]['u'] : 0;
    }
    $g_total_t += $row_t;
    $g_total_u += $row_u;

    $row = '<tr><td>'.$sale.'</td>';
    foreach($years as $year) {
        $t = array_key_exists($year, $key) ? $key[$year]['t'] : 0;
        $u = array_key_exists($year, $key) ? $key[$year]['u'] : 0;
        $row .= '<td>'.number_format($t, 2).'$</td>';
        $row .= '<td><h5><span style="width:40px;" class="badge badge-info">'.$u.'</span></h5></td>';
    }
    $row .= '<td>'.number_format($row_t, 2).'$</td>';
    $row .= '<td><h5><span style="width:40px;" class="badge badge-info">'.$row_u.'</span></h5></td>';
    $row .= '</tr>';
    echo $row;
}

$footer = '<tfoot><tr><td>Totals</td>';
foreach($years as $year) {
    $footer .= '<td>'.number_format($total_t[$year], 2).'$</td>';
    $footer .= '<td><h5><span style="width:40px;" class="badge badge-info">'.$total_u[$year].'</span></h5></td>';
}
$footer .= '<td><b>'.number_format($g_total_t, 2).'$</b></td>';
$footer .= '<td><h5><span style="width:40px;" class="badge badge-info">'.$g_total_u.'</span></h5></td>';
$footer .= '</tr></tfoot>';
echo $footer;

@endphp
                                           
                                           
</x-adminlte-datatable>
                           




 