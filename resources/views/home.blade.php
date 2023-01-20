@extends('adminlte::page')

@section('title', 'Nipponia Applications')

@section('content_header')
    <h1>Basic Rates {{$today}}</h1>
@stop

@section('content')
<div class="row">
    


                    <div class="col-md-4">
                   <x-adminlte-info-box title="USD to CNY" text={{$rate_usd_cny}} icon="fa fa-money-bill-wave text-dark"/>
                    </div>


                    <div class="col-md-4">
                            <x-adminlte-info-box title="EUR to CNY" text={{$rate_eur_cny}} icon="fa fa-money-bill-wave text-dark"/>
                    </div>
                    <div class="col-md-4">
                            <x-adminlte-info-box title="EUR to USD" text={{$rate_eur_usd}} icon="fa fa-money-bill-wave text-dark"/>
                    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
