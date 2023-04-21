<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceEurToTrackPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('track_prices', function (Blueprint $table) {
            $table->float('price_eur')->nullable()->default(0)->after('price_yuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('track_prices', function (Blueprint $table) {
            $table->dropColumn('price_eur');
        });
    }
}
