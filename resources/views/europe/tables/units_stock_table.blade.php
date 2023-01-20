                                  

<table id="table_stock" class="table table-striped" style="width:100%">
        <thead>

                <th>Warehouse</th>
                <th>Model</th>
                <th>Units</th>

            </tr>
        </thead>
        <tbody>

        @php
$total=0;

foreach($warehouse_stock as $result) {
       echo '<tr><td>'.$result['Warehouse'].'</td><td >'.$result['Model'].'</td><td class="modelseuro">'. $result['Stock'].'</td> </tr>';
       $total+=$result['Stock'];
 
}

echo '</tbody><tfoot><tr><td>Total:</td><td></td><td class="modelseuro modelseurototal" id="total_sum">'.$total.'</td></tr></tfoot>';


@endphp

</table>





                                      

 