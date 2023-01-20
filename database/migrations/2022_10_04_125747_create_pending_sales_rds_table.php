<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingSalesRdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_sales_rds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('moto_descr')->nullable();
            $table->integer('year_sold')->nullable();
            $table->bigInteger('units')->nullable();
            $table->double('order_value')->nullable();
            $table->string('order_code')->nullable();
            $table->date('date_fortosi')->nullable();
            $table->date('date_afixi')->nullable();
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pending_sales_rds');
    }
}
