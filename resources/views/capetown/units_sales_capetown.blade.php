@extends('adminlte::page')
@section('title', 'Units Sales')
@section('plugins.Datatables', true)
@section('content_header')
        <a href="{{ URL::previous() }}">Go Back</a>
        <h1>Capetown S.A. - Units Sales  @php echo $selected_month_name." ".$selected_year; @endphp </h1>
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
@endphp



@section('content')
{{-- Example with empty option (for Select) --}}





<form method="get" action="/units_sales_capetown">

              <div class="row">
                          <div class="col-md-3">   
                                    <x-adminlte-select name="year">
                                              <x-adminlte-options :options="['2019'=>2019,'2020'=>2020,'2021'=>2021, '2022'=>2022, '2023'=>2023, '2024'=>2024]" :selected="$selected_year_option" />
                                    </x-adminlte-select>
                          </div>
                                  <div class="col-md-3">   
                                  <x-adminlte-select name="month">
                                          <x-adminlte-options :options="[ 1=>'January', 2=>'February', 3=>'March', 4=>'April',5=>'May', 6=>'June', 7=>'July', 8=>'August',9=>'September', 10=>'October', 11=>'November', 12=>'December', 0=>'All']"  :selected="$selected_month_option"/>
                                    </x-adminlte-select>
                                  </div>
                          <div class="col-md-3">   
                                    <button type="submit" class="btn btn-primary">Update</button>
                          </div>
              </div>
</form>




@php

//var_dump($uii);

@endphp

<!-- arxi -->
<div class="row">
    <div class="col-md-6">
      <!-- pinakas -->
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">
            <i class="far fa-chart-bar"></i>
           Sales (units) per model for @php echo $selected_month_name." ".$selected_year; @endphp
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>


        </div>



        <div class="card-body">


         @include('capetown.tables.units_sales_table_capetown')
        

        </div>
        <!-- /.card-body-->
      </div>
      <!-- /.card -->


    </div>
    <!-- /.col -->

 
  






    

<div class="col-md-6">
  
<!-- chart js -->
<div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">
                   Sales Graph
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>


        </div>



        <div class="card-body">


        <x-adminlte-callout> 
          
        <canvas id="motosaleschart" >


        </canvas></x-adminlte-callout>

      


        </div>
        <!-- /.card-body-->
      </div>
      <!-- /.card -->


<!-- chart js -->




 <!-- shmeioseis -->
 <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">
                    Notes on Report
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
      </div>
       <div class="card-body">
       <x-adminlte-callout>The sale figures are updated daily.</x-adminlte-callout>

        </div>
        <!-- /.card-body-->
      </div>
      <!-- /.card -->







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

<script>


var ctx = document.getElementById("motosaleschart");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {







    labels: [

   
          
          @foreach($total_sales_per_month as $result=>$key)
                          "{!! $result !!}", 
                  @endforeach
    
       

            ],










    datasets: [{
      label: '# of Moto',
      data: [
          
          
    
          
        @foreach($total_sales_per_month as $result=>$key)
                        "{!! $key !!}", 
                @endforeach
          
          
          
          ],







          backgroundColor: [
'rgba(101, 239, 149, 0.3)',
'rgba(166, 60, 125, 0.2) ',
'rgba(159, 184, 100, 0.9) ',
'rgba(147, 244, 199, 0.8)',
'rgba(41, 209, 251, 0.5)',
'rgba(223, 31, 190, 0.5) ',
'rgba(76, 209, 57, 0.3) ',
'rgba(131, 107, 185, 0.7)',
'rgba(115, 205, 252, 0.6)',
'rgba(76, 169, 100, 1)',
'rgba(202, 14, 176, 0.2)',
'rgba(189, 52, 79, 0.5)',
'rgba(234, 13, 86, 0.7)',
'rgba(108, 64, 158, 0.1)',
'rgba(167, 7, 169, 0.4)',
'rgba(111, 248, 247, 0.2)',
'rgba(242, 152, 90, 0.2)',
'rgba(203, 158, 32, 0.8)',
'rgba(220, 6, 39, 0.3)'







      ],
      borderColor: [
'rgba(101, 239, 149, 1)',
'rgba(166, 60, 125, 1) ',
'rgba(159, 184, 100, 1) ',
'rgba(147, 244, 199, 1)',
'rgba(41, 209, 251, 1)',
'rgba(223, 31, 190, 1) ',
'rgba(76, 209, 57, 1) ',
'rgba(131, 107, 185, 1)',
'rgba(115, 205, 252, 1)',
'rgba(76, 169, 100, 1)',
'rgba(202, 14, 176, 1)',
'rgba(189, 52, 79, 1)',
'rgba(234, 13, 86, 1)',
'rgba(108, 64, 158, 1)',
'rgba(167, 7, 169, 1)',
'rgba(111, 248, 247, 1)',
'rgba(242, 152, 90, 1)',
'rgba(203, 158, 32, 1)',
'rgba(220, 6, 39, 1)'

      ],







    
      borderWidth: 1
    }]
  },
  options: {
   	//cutoutPercentage: 40,
    responsive: true,





  }
});



</script>
@stop