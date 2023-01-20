@extends('adminlte::page')
@section('title', 'Nipponia Applications')
@section('plugins.Datatables', true)
@section('content_header')

@php
$heads_products = [
    'Model',
    'Maker',
    'Type',
    ['label' => 'Actions', 'no-export' => true],

];
$config = [
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
       
$config['dom'] = '<"row" <"col-sm-7" B> <"col-sm-5 d-flex justify-content-end" i> >
                  <"row" <"col-12" tr> >
                  <"row" <"col-sm-12 d-flex justify-content-start" f> >';
$config['paging'] = false;
$config["lengthMenu"] = [ 10, 50, 100, 500];
@endphp
 <!-- create new product modal -->
 <script>
        function createnewproduct() {
  $("#createnewproduct").modal();
                            }

 </script>
 <!-- create new product modal -->
 <div class="row">
                    <div class="col-md-4 mb-3">
                    <h1>Products</h1>
                    </div>
 </div>             
 <div class="row">
                    <div class="col-md-4 mb-3">
                            <x-adminlte-button label="Create new Product" onclick="createnewproduct()" theme="primary" />
                    </div>
 </div>


@stop
@section('content')

<div class="container-xxl">
<div class="row">
<div class="col-md-9 mb-5">

           <x-adminlte-datatable id="head_products" :heads="$heads_products" striped hoverable with-buttons>
           @foreach(App\Models\Product::all()  as $product)
                <tr><td>{{ $product->model }}</td><td>{{ $product->maker }}</td><td>{{ $product->type }}</td><td><a id="{{$product->id}}" href=@php echo url("/product?motoid={$product->id}"); @endphp><button class="btn btn-xs btn-default text-primary mx-1 shadow" onclick="getMessage()" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button></a>     <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" onclick="getMessage('{{$product->id}}')" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-lg fa-fw fa-eye"></i></button> </td></tr>
        
            @endforeach

            </x-adminlte-datatable>
</div>

</div>


</div>


@include('offcanvas.create_new_product')
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

