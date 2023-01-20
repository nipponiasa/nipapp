<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVintomodelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vintomodel', function (Blueprint $table) {
            $table->id();
            $table->string('vin');
            $table->string('maker')->nullable();
            $table->string('model');
            $table->string('color')->nullable();
            $table->string('speedversion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vintomodel');
    }
}
