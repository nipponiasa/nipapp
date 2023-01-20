<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CapetownSaleUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleunitscapetown', function (Blueprint $table) {
            $table->id();
            $table->string('ArticuloCodigo')->nullable();
            $table->string('ArticuloDescripcion')->nullable();
            $table->string('ArticuloClasificacion1')->nullable();
            $table->string('Zona')->nullable();
            $table->string('Bodega')->nullable();
            $table->string('Cliente')->nullable();
            $table->string('Vendedor')->nullable();
            $table->string('Factura')->nullable();
            $table->string('vin')->nullable();
            $table->dateTime('FechaFactura')->nullable();
            $table->integer('SemanaFactura')->nullable();
            $table->integer('MesFactura')->nullable();
            $table->integer('TrimestreFactura')->nullable();
            $table->integer('AnoFactura')->nullable();
            $table->integer('Cantidad')->nullable();
            $table->float('Impuesto1Local')->nullable();
            $table->float('Impuesto1Dolar')->nullable();
            $table->float('TotalImpuestoLocal')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saleunits');
    }
}
