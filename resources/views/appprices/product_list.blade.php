@extends('adminlte::page')
@section('title', 'Nipponia Applications')
@section('plugins.Datatables', true)
@section('content_header')

@php
$heads_products = [
    'Model',
    'Maker',
    'Type',
    'Country',
    ['label' => 'Actions', 'no-export' => true]

];
$config = [
    'order' => [[1, 'asc']],
];
       


$config["lengthMenu"] = [ 10, 50, 100, 500];
@endphp



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
                <tr class="product" data-product-id="{{ $product->id }}">
                    <td data-product-model>{{ $product->model }}</td>
                    <td data-product-maker>{{ $product->maker }}</td>
                    <td data-product-type>{{ $product->type }}</td>
                    <td data-product-country>{{ $product->country }}</td>
                    <td>
                        
                        <button class="btn btn-xs btn-default text-primary shadow" data-toggle="modal" data-target="#producteditform" title="Edit" data-productid="{{ $product->id }}"   onclick="editproduct({{$product->id}})" title="Details"><i class="fa fa-lg fa-fw fa-edit"></i></button>
                        {{-- delete. It is a GET reuquest! --}}
                        <a onclick="return confirm('Delete item? Make sure it is not used!');" href=@php echo url("/product_delete_form?productid={$product->id}"); @endphp><button class="btn btn-xs btn-default text-primary mx-1 shadow"   title="Trash" ><i class="fa fa-lg fa-fw fa-trash" style="color:crimson"></i></button></a>
                    </td>
                </tr>
        
            @endforeach

            </x-adminlte-datatable>
</div>

</div>

</div>




 <!-- create/edit product modal -->
 <script>
    function createnewproduct() {
        $("#createnewproduct").modal();
    }

    function editproduct(productID) {
        // the product that was clicked
        let currentProduct = $(`tr.product[data-product-id="${productID}"]`);
        // populate the edit form fields with the current product
        $('#producteditmodal [name="id"]').val(productID);
        $('#producteditmodal [name="model"]').val(currentProduct.find('[data-product-model]').text());
        $('#producteditmodal [name="maker"]').val(currentProduct.find('[data-product-maker]').text());
        $('#producteditmodal [name="type"]').val(currentProduct.find('[data-product-type]').text());
        $('#producteditmodal [name="country"]').val(currentProduct.find('[data-product-country]').text());

        $("#producteditmodal").modal();
    }
</script>
<!-- create/edit new product modal -->




@include('appprices.offcanvas.create_new_product')
@include('appprices.offcanvas.product_edit')
@stop
@section('css')

@stop

@section('js')

@stop

