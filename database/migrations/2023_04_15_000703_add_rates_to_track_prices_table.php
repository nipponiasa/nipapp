<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRatesToTrackPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('track_prices', function (Blueprint $table) {
            $table->float('eur_yuan_at_date')->nullable()->after('us_yuan_at_date');
            $table->float('eur_us_at_date')->nullable()->after('eur_yuan_at_date');
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
            $table->dropColumn(['eur_yuan_at_date','eur_us_at_date']);
        });
    }
}
