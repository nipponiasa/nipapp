@extends('adminlte::page')
@section('title', 'Clients RD')
@section('plugins.Datatables', true)
@section('content_header')
        <a href="{{ URL::previous() }}">Go Back</a>
        <h1>Nipponia Caribe - Customers </h1>
      






@stop



@php
$heads_clients = [ 
  ['label' => 'Name', 'width' => 5],
  'Shortcode'
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

@endphp



@section('content')


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
          Clients
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>


        </div>



        <div class="card-body">


      @include('rd.tables.clients_rd_table')
        

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


