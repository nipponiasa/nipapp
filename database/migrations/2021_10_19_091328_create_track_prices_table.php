<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_prices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('offer_type')->nullable();
            $table->date('price_capture_date')->nullable();
            $table->string('order_name')->nullable();
            $table->integer('product')->nullable();
            $table->string('packing')->nullable();
            $table->float('price_us')->nullable();
            $table->float('price_yuan')->nullable();
            $table->float('us_yuan_at_date')->nullable();
            $table->boolean('fixed_price')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('created_by')->nullable();
            $table->text('path_to_attachments')->nullable();






        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('track_prices');
    }
}
