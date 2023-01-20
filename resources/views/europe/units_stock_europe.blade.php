@extends('adminlte::page')
@section('title', 'Stock Status Europe')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)
@section('content_header')
        <a href="{{ URL::previous() }}">Go Back</a>
        <h1>Nipponia S.A. - Stock Status Europe</h1>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


@stop

@php

$heads_motos = [ 'Warehouse','Model', 'Units'];
$config = [

        'order' => [[2, 'desc']],
        //'columns' => [['orderable' => false,'visible'=> true, 'className' => 'text-center','width'=> '5%' ], ['className' => 'text-center wrap','width'=> '7%'], ['className' => 'text-center'], ['className' => 'text-center'], ['className' => 'text-center'] ],
        'columns' => [['orderable' => false,'visible'=> true, 'className' => 'text-left' ], ['className' => 'text-left'], ['className' => 'text-center', 'sum'=>true]],
        'paging'=>   false,
        'searching'=>   true,
        'info'=>   false,
        'scrollX'=> 400,
       
        ];
@endphp







@section('content')





<!-- arxi -->
<div class="row">
    <div class="col-md-9">
      <!-- pinakas -->
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">
            <i class="far fa-chart-bar"></i>
          Stock per Warehouse
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>


        </div>



        <div class="card-body">


         @include('europe.tables.units_stock_table')
        

        </div>
        <!-- /.card-body-->
      </div>
      <!-- /.card -->


    </div>
    <!-- /.col -->

 
  






    

    <div class="col-md-3">
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


        <x-adminlte-callout>The stock figures are updated daily.</x-adminlte-callout>

      


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
    <link rel="stylesheet" href="/css/va.css">
@stop

@section('js')
<script src="{{ asset('js/va/sum_eurostock.js') }}"></script>

@stop