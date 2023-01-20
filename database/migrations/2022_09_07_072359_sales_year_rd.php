<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SalesYearRd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_year_rd', function (Blueprint $table) {
            $table->id();
            $table->string('gxcode')->nullable();
            $table->string('gxname')->nullable();
            $table->string('relcode')->nullable();
            $table->string('altcode')->nullable();
            $table->string('moto_description')->nullable();
            $table->string('moto_group')->nullable();
            $table->integer('year_sold')->nullable();
            $table->bigInteger('units')->nullable();
            $table->double('turnover')->nullable();
            $table->string('dbtype')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_year_rd');
    }
}
