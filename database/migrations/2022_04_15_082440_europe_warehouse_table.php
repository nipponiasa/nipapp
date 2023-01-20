<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EuropeWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('europe_warehouse', function (Blueprint $table) {
            $table->id();
            $table->string('ItemCode')->nullable();
            $table->text('ItemDescription')->nullable();
            $table->string('Warehouse')->nullable();
            $table->string('VIN')->nullable();
            $table->string('Colour')->nullable();
            $table->string('Speed')->nullable();
            $table->integer('Balance')->nullable();
            $table->integer('Sales')->nullable();
            $table->integer('Purchases')->nullable();
            $table->integer('Imports')->nullable();
            $table->integer('Exports')->nullable();
            $table->integer('OtherImports')->nullable();
            $table->integer('OtherExports')->nullable();
            $table->string('Document')->nullable();
            $table->string('Order')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('europe_warehouse');
    }
}
