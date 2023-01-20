@extends('adminlte::page')
@section('title', 'Units Sales per Warehouse')
@section('plugins.Datatables', true)
@section('content_header')
        <a href="{{ URL::previous() }}">Go Back</a>
        <h1>Capetown S.A. - Units Sales per Distributor <b><u>@php echo $bodega==='0'?"All":$bodega; @endphp</b></u> </h1>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>






@stop



@php
$heads_motos = [ 
  ['label' => 'Model', 'width' => 5],
  'Invoiced'
  ];
$config = [

        'order' => [[0, 'asc']],
        //'columns' => [['orderable' => false,'visible'=> true, 'className' => 'text-center','width'=> '5%' ], ['className' => 'text-center wrap','width'=> '7%'], ['className' => 'text-center'], ['className' => 'text-center'], ['className' => 'text-center'] , ['className' => 'text-center']],
        'columns' => [['orderable' => true,'visible'=> true, 'className' => 'text-left' ], ['orderable' => true,'className' => 'text-center wrap']],
        'paging'=>   false,
        'searching'=>   false,
        'info'=>   false,
        'scrollX'=> 400,
        ];

$selected_year_option=[$selected_year];
$selected_month_option=[$selected_month];
$selected_bodega=[$bodega];
$selected_bodega_option[0]="All";

//dd($warehouses);
foreach($warehouses as $warehouse){
$selected_bodega_option[$warehouse->bodega]=$warehouse->bodega;

}
//dd($selected_bodega_option);
@endphp



@section('content')
{{-- Example with empty option (for Select) --}}









<form method="get" action="/units_sales_capetown_warehouse">
        <div class="row">


                                        <div class="col-md-3">   
                                        <x-adminlte-select name="year"  onchange="filter_dealers()">
                                                      <x-adminlte-options  :options="['2019'=>2019,'2020'=>2020,'2021'=>2021, '2022'=>2022, '2023'=>2023, '2024'=>2024, 0=>'All']" :selected="$selected_year_option" />
                                        </x-adminlte-select>
                                        </div>
                                        <div class="col-md-3">   
                                        <x-adminlte-select name="month" onchange="filter_dealers()">
                                                  <x-adminlte-options :options="[ 1=>'January', 2=>'February', 3=>'March', 4=>'April',5=>'May', 6=>'June', 7=>'July', 8=>'August',9=>'September', 10=>'October', 11=>'November', 12=>'December', 0=>'All']"  :selected="$selected_month_option"/>
                                          </x-adminlte-select>
                                        </div>

                      </div>
                                  <div class="row">   
                                        <div class="col-md-3">
                                        <x-adminlte-select name="bodega" >
                                                      <x-adminlte-options  :options="$selected_bodega_option" :selected="$selected_bodega" />
                                          </x-adminlte-select>
                                     </div>
                                        <div class="col-md-3 ">   
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                        </div>

                                    </div>

       
</form>




@php

//var_dump($uii);

@endphp

<!-- arxi -->
<div class="row" style="margin-top:20px;">
    <div class="col-md-6">
      <!-- pinakas -->
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">
            <i class="far fa-chart-bar"></i>
           Sales (units) per model for @php echo $bodega!=0?$bodega:"all distributors"; @endphp
          </h3>

          <div class="card-tools"  >
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>


        </div>



        <div class="card-body"  >

        @include('capetown.tables.units_sales_table_capetown_warehouse')
        

        </div>
        <!-- /.card-body-->
      </div>
      <!-- /.card -->


    </div>
    <!-- /.col -->

    <div class="col-md-6">



  



    </div>
    <!-- /.col -->



    <!-- /.col -->
  </div>

 <!-- telos -->



@stop





@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{ asset('js/va/select_warehouses.js') }}"></script>
@stop