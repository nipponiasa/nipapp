@extends('adminlte::page')
@section('title', 'Nipponia Applications')

<style>

.boxsizingBorder {
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
}




    </style>



@section('content_header')





@php
$heads_prices = [
    'Model',
    'Country',
    'Maker',
    'Date of track',
    'Price info type',
    'Packing',
    'Exact Offer Price',
    'Calculated Price',
    'Price (€)',
    ['label' => 'Actions', 'no-export' => true],

];
$config = [
    'order' => [[1, 'asc']],
    'columns' => [null, null,null, null, null, null,null,null,null, ['orderable' => false]],
];
       

// $config['paging'] = true;
$config["lengthMenu"] = [ 20, 50, 100, 500];
@endphp
 <!-- create new product modal -->
 <script>
        function createnewprice() {
  $("#createnewprice").modal();
                            }
  </script>
 <!-- create new product modal -->

 <div class="container-fluid">
 <div class="row">
                    <div class="col-md-4 mb-3">
                    <h1>Prices</h1>
                    </div>
 </div>             
 <div class="row">
                    <div class="col-md-4 mb-3">
                            <x-adminlte-button label="List a new price" onclick="createnewprice()" theme="primary" />
                    </div>
 </div>
 </div>

@stop
@section('content')

<div class="container-fluid">
        <div class="row" >

             <x-adminlte-datatable id="table_prices" :heads="$heads_prices" :config="$config" striped hoverable with-buttons>
                        @foreach($price_table  as $price)
                    
                                    <tr>
                                        <td>{{$price->model}}</td>
                                        <td>{{$price->country}}</td>
                                        <td>{{$price->maker}}</td>
                                        <td>{{$price->price_capture_date}}</td>
                                        <td>{{$price->offer_type}} {{$price->order_name}}</td>
                                        <td>{{$price->packing}} - {{$price->packingqty}}</td>
                                        <td align="right">
                                        @php    
                                        if( $price->price_us!=0) 
                                        {
                                            $timi2=$price->price_us;
                                                        echo number_format($timi2,2).' $ at '.number_format($price->us_yuan_at_date,2);
                                        }
                                        elseif( $price->price_yuan!=0)
                                        {
                                            $timi2=$price->price_yuan;
                                                        echo number_format($timi2,2).' ¥ at '.number_format($price->us_yuan_at_date,2);
                                        }
                                    
                                        @endphp
                                    
                                    </td>
                                        <td align="right">
                            @php 
                                    if((is_null($price->price_us) or $price->price_us===0.0) and (!is_null($price->us_yuan_at_date) and $price->us_yuan_at_date!=0)) //einai yuan
                                                    {
                                                        $timi=$price->price_yuan/$price->us_yuan_at_date; 
                                                        echo number_format($timi,2)." $";
                                                    }
                                                              
                                    elseif($price->price_us!=0 and (!is_null($price->us_yuan_at_date) and $price->us_yuan_at_date!=0)) // einai dolario
                                                    {
                                                        $timi=$price->price_us*$price->us_yuan_at_date/$rate_usd_cny; // $us_yuan_at_date = old price, $rate_usd_cny = today's price
                                                        echo number_format($timi,2)." $";

                                                    }
                                    
                            @endphp
                                
                                    </td>

                                    <td>

                                    </td>

                                    <td>
                                        <!--   <a id="{{ $price->id }}" href=@php echo url("/price_edit_form?price={$price->id}"); @endphp><button class="btn btn-xs btn-default text-primary mx-1 shadow" onclick="getMessage()" title="Edit"><i class="fa fa-lg fa-fw fa-pen"></i></button></a>  -->
                                            <button class="btn btn-xs btn-default text-primary shadow m-1"    data-toggle="modal" data-target="#priceeditform" title="View"    onclick="editprice({{$price->id}})" title="Details"><i class="fa fa-lg fa-eye m-1"></i></button> 
@if($price->path_to_attachments!="")
                                            <a  id="{{ $price->id }}" target="_blank" href=@php echo url("{$price->path_to_attachments}"); @endphp><button class="btn btn-xs btn-default text-teal shadow m-1"  title="Show Document"><i style ="color:red;" class="fa fa-lg fa-file-pdf m-1"></i></button></a>
                                   @else
                                  <button class="btn btn-xs btn-default text-teal shadow m-1"  title="Show Document"><i style ="color:grey;" class="fa fa-lg fa-fw fa-file-pdf"></i></button>
                                   @endif
                                            <a onclick="return confirm('Delete item?');" id="trash" href=@php echo url("/price_delete_form?priceid={$price->id}"); @endphp><button class="btn btn-xs btn-default text-primary shadow m-1"   title="Trash"><i class="fa fa-lg fa-trash m-1"></i></button></a> 
                                        </td></tr>
                            @endforeach
           </x-adminlte-datatable>

     </div>
</div>




@include('appprices.offcanvas.create_new_price')
@include('appprices.offcanvas.price_edit')
@stop
@section('css')

@stop

@section('js')
<script src="{{ asset('js/va/createnewpricemodal.js') }}"></script>
<script src="{{ asset('js/va/subvalidations.js') }}"></script>
<script src="{{ asset('js/va/fillshowmodal.js') }}"></script>




@stop

