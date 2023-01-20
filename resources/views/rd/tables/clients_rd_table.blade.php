                                  
<x-adminlte-datatable id="table_invoices" :heads="$heads_clients" :config="$config"  striped>
@php
 

                                          
foreach($client_list as $client) {
       $shortcodecleaned=substr($client->codename,0,1)===","?substr($client->codename, 1):$client->codename;
       $relcode_empty=$client->relcode===""?'null':$client->relcode;
       echo '<tr><td><a href=current_customer/'.$client->altcode.'/'.$relcode_empty.'>'.$client->gxname.'</a></td><td >'.$shortcodecleaned.'</td></tr>';
   
 
}

echo '<tfoot><tr><td></td><td style="text-align: right;" ></td></tr></tfoot>';


@endphp
                                           
                                           
</x-adminlte-datatable>
                           






 