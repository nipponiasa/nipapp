@extends('adminlte::page')
@section('title', 'Customer')
@section('plugins.Datatables', true)
@section('content_header')
  <a href="{{ URL::previous() }}" class="no-print">Go Back</a>
        <h1> @php echo $current_customer; @endphp </h1>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>






@stop



@php
$current_year = (int) date('Y');        // Εδώ ορίζεται το τρέχον έτος.
//$current_year = 2027;       // test
$heads_client_current = [ 
  ['label' => 'Model'],
  ['label' => (string)($current_year - 3)],
  ['label' => ''],
  ['label' => (string)($current_year - 2)],
  ['label' => ''],
  ['label' => (string)($current_year - 1)],
  ['label' => ''],
  ['label' => (string)$current_year],
  ['label' => ''],
  ['label' => 'Total'],
  ['label' => ''],
  ];


  $configsales = [


'columns' => [
 ['orderable' => true,'visible'=> true, 'className' => 'text-left wrap' ],
 ['orderable' => true,'className' => 'text-right'],
 ['orderable' => true,'className' => 'text-left'],
 ['orderable' => true,'className' => 'text-right'],
 ['orderable' => true,'className' => 'text-left'],
 ['orderable' => true,'className' => 'text-right'],
 ['orderable' => true,'className' => 'text-left'],
 ['orderable' => true,'className' => 'text-right'],
 ['orderable' => true,'className' => 'text-left'],
 ['orderable' => true,'className' => 'text-right'],
 ['orderable' => true,'className' => 'text-left'],

           ],
 'paging'=>   false,
 'searching'=>   false,
 'info'=>   false,
 'scrollX'=> false,
 ];



@endphp





@php
$heads_client_pending_sales_current = [ 
              ['label' => 'Order'],
              ['label' => 'Model'],
              ['label' => 'Units'],
              ['label' => 'Value'],
              ['label' => 'ETD'],
              ['label' => 'ETA'],
              ['label' => 'Year of contract']
  ];
$config = [
              'columns' => [
                            ['orderable' => true,'visible'=> true, 'className' => 'text-left wrap' ],
                            ['orderable' => true,'className' => 'text-right'],
                            ['orderable' => true,'className' => 'text-right'],
                            ['orderable' => true,'className' => 'text-right'],
                            ['orderable' => true,'className' => 'text-right text-nowrap','width'=> '9%'],
                            ['orderable' => true,'className' => 'text-right text-nowrap','width'=> '7%'],
                            ['orderable' => true,'className' => 'text-right'],
                          ],
              'paging'=>   false,
              'searching'=>   false,
              'info'=>   false,
              'scrollX'=> false,
 ];

// Για τον caribe_user, ορίζονται ξανά τα $heads και $config του πίνακα Pending Sales
// ώστε να αφαιρεθεί η στήλη "Value" — το αντίστοιχο <td> αφαιρείται στο caribe partial.
if(auth()->user()->role === 'caribe_user') {
    $heads_client_pending_sales_current = [
                  ['label' => 'Order'],
                  ['label' => 'Model'],
                  ['label' => 'Units'],
                  ['label' => 'ETD'],
                  ['label' => 'ETA'],
                  ['label' => 'Year of contract']
      ];
    $config = [
                  'columns' => [
                                ['orderable' => true,'visible'=> true, 'className' => 'text-left wrap' ],
                                ['orderable' => true,'className' => 'text-right'],
                                ['orderable' => true,'className' => 'text-right'],
                                ['orderable' => true,'className' => 'text-right text-nowrap','width'=> '9%'],
                                ['orderable' => true,'className' => 'text-right text-nowrap','width'=> '7%'],
                                ['orderable' => true,'className' => 'text-right'],
                              ],
                  'paging'=>   false,
                  'searching'=>   false,
                  'info'=>   false,
                     'scrollX'=> false,
     ];
}

@endphp






















@section('content')
{{-- Example with empty option (for Select) --}}



<div class="mb-5">
  @isset($customer_balance[0])
    <div>Logistic status at date: {{$customer_balance[0]->date_updated}}</div>
  @endisset
    <div class="row ">
        <x-adminlte-callout class="col-md-3 m-2 " theme="info" title="Balance (invoiced) ">
      <h5>
        <span class="badge badge-primary">
          @isset($customer_balance[0]->balance)
            {{ number_format($customer_balance[0]->balance, 2) }} {{ $customer_balance[0]->currency }}
          @else
            &nbsp;-&nbsp;
          @endisset
        </span>
      </h5>
        </x-adminlte-callout>
        <x-adminlte-callout class="col-md-3 m-2 " theme="danger" title="Overdues">
      <h5>
        <span class="badge badge-danger">
          @isset($customer_balance[0]->overdues)
            {{ number_format($customer_balance[0]->overdues, 2) }} {{ $customer_balance[0]->currency }}
          @else
            &nbsp;-&nbsp;
          @endisset
        </span>
      </h5>
        </x-adminlte-callout>
        <x-adminlte-callout class="col-md-3 m-2 " theme="success" title="Deposits">
      <h5>
        <span class="badge badge-success">
          @isset($customer_balance[0]->deposits)
            {{ number_format($customer_balance[0]->deposits, 2) }} {{ $customer_balance[0]->currency }}
          @else
            &nbsp;-&nbsp;
          @endisset
        </span>
      </h5>
        </x-adminlte-callout>
    </div>
</div>



<!-- arxi -->
<div class="row">
  
    










    <div class="col-md-12">
      <!-- pinakas -->
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">
            <i class="far fa-chart-bar"></i>
           Pending Sales @php ; @endphp
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>


        </div>



        <div class="card-body">


         @if(auth()->user()->role === 'caribe_user')
             @include('rd.tables.current_client_pending_sales_rd_caribe_table')
         @else
             @include('rd.tables.current_client_pending_sales_rd_table')
         @endif
        

        </div>
        <!-- /.card-body-->
      </div>
      <!-- /.card -->


    </div>
    <!-- /.col -->








   
  </div>

 <!-- telos -->




<!-- arxi -->
<div class="row">
    <div class="col-md-12">
      <!-- pinakas -->
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">
            <i class="far fa-chart-bar"></i>
           Sales amount (units) per model
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>


        </div>



        <div class="card-body">


         @if(auth()->user()->role === 'caribe_user')
             @include('rd.tables.current_client_rd_caribe_table')
         @else
             @include('rd.tables.current_client_rd_table')
         @endif
        

        </div>
        <!-- /.card-body-->
      </div>
      <!-- /.card -->


    </div>
    <!-- /.col -->

 

    <!-- /.col -->
  </div>

 <!-- telos -->

















@if(auth()->user()->role !== 'caribe_user')
<!-- arxi diagrammatwn -->
<div class="row">
  





<div class="col-md-6">
  
<!-- chart js -->
<div class="card card-primary card-outline print-keep-together">
        <div class="card-header">
          <h3 class="card-title">
          <i class="far fa-chart-bar"></i>
                   Sales Graph all Years (Units)
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>


        </div>



        <div class="card-body" >
         <canvas id="motosaleschart" >
      </div>
        <!-- /.card-body-->
      </div>
      <!-- /.card -->


<!-- chart js -->


    </div>
















    <div class="col-md-6">
      <!-- pinakas -->
      <div class="card card-primary card-outline print-keep-together">
        <div class="card-header">
          <h3 class="card-title">
            <i class="far fa-chart-bar"></i>
            Sales Graph all Years (Turnover)
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>


        </div>



        <div class="card-body">

    
          
        <canvas id="motosaleschart2" >



       
        

        </div>
        <!-- /.card-body-->
      </div>
      <!-- /.card -->


    </div>
    <!-- /.col -->























    <!-- /.col -->
  </div>

 <!-- telos diagrammatwn -->
@endif



<style>
  @media print {
    .content-header {
      display: block !important;
    }

    .table-responsive {
        overflow: visible !important;
    }

    .print-keep-together {
      break-inside: avoid-page;
      page-break-inside: avoid;
    }

    .print-keep-together .card-header,
    .print-keep-together .card-body {
      break-inside: avoid-page;
      page-break-inside: avoid;
    }
    }
</style>






























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

   
          
      @foreach($sales_chart as $sale)
                        "{!! $sale->moto_description !!}", 
                @endforeach
    
       

            ],



    datasets: [{
      label: '# of Moto',
      data: [
          
          
    
          
        @foreach($sales_chart as $sale)
                        "{!! $sale->units !!}", 
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









<script>


var ctx = document.getElementById("motosaleschart2");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {


    labels: [

   
          
      @foreach($sales_chart as $sale)
                        "{!! $sale->moto_description !!}", 
                @endforeach
    
       

            ],



    datasets: [{
      label: '# of Moto',
      data: [
          
          
    
          
        @foreach($sales_chart as $sale)
                        "{!! $sale->turnover !!}", 
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