<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBasicsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->enum('type',  ['Electric','Petrol (Euro V)','Batteries', 'Other'])->default('Other');
            $table->string('model')->nullable();
            $table->string('maker')->nullable();
           
           
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->enum('type',  ['Electric','Petrol (Euro V)','Petrol','Batteries', 'Other'])->default('Other');
            $table->string('model')->nullable();
            $table->string('maker')->nullable();
            
            //
        });
    }
}
