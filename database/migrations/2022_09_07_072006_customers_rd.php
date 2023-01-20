<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustomersRd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_rd', function (Blueprint $table) {
            $table->id();
            $table->string('gxcode')->nullable();
            $table->string('gxname')->nullable();
            $table->string('shortcode')->nullable();
            $table->string('country')->nullable();
            $table->string('relationcode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers_rd');
    }
}
