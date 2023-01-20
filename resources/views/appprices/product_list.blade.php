@extends('adminlte::page')
@section('title', 'Nipponia Applications')
@section('plugins.Datatables', true)
@section('content_header')

@php
$heads_products = [
    'Model',
    'Maker',
    'Type'


];
$config = [
    'order' => [[1, 'asc']],
];
       


$config["lengthMenu"] = [ 10, 50, 100, 500];
@endphp



 <!-- create new product modal -->
 <script>
        function createnewproduct() {
  $("#createnewproduct").modal();
                            }
 </script>
 <!-- create new product modal -->


 <div class="container-fluid">

 <div class="row">
                    <div class="col-md-4 mb-3">
                    <h1>Products</h1>
                    </div>
 </div>             
 <div class="row">
                    <div class="col-md-4 mb-3">
                            <x-adminlte-button label="Create new Product" onclick="createnewproduct()"  />
                    </div>
 </div>


@stop
@section('content')


<div class="row">
<div class="col-md-9 mb-5">

           <x-adminlte-datatable id="head_products" :heads="$heads_products" :config="$config" striped hoverable with-buttons>
           @foreach(App\Models\Product::all()  as $product)
                <tr><td>{{ $product->model }}</td><td>{{ $product->maker }}</td><td>{{ $product->type }}</td></tr>
        
            @endforeach

            </x-adminlte-datatable>
</div>

</div>

</div>



@include('appprices.offcanvas.create_new_product')
@stop
@section('css')

@stop

@section('js')

@stop

