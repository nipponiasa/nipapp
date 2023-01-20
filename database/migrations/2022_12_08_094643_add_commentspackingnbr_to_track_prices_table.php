<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentspackingnbrToTrackPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('track_prices', function (Blueprint $table) {
            $table->text('comments')->nullable();
            $table->text('packingqty')->nullable();
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
            Schema::dropIfExists('comments');
            Schema::dropIfExists('packingqty');
        });
    }
}
