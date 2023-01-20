<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBalanceRdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_balance_rds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('customer_code')->nullable();
            $table->string('currency')->nullable();
            $table->double('balance')->nullable();
            $table->date('date_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_balance_rds');
    }
}
