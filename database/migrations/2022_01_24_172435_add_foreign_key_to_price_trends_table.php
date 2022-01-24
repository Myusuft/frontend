<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPriceTrendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('price_trends', function (Blueprint $table) {
            $table->foreign('area_detail_id', 'price_trends_ibfk_1')->references('id')->on('area_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('price_trends', function (Blueprint $table) {
            $table->dropForeign('price_trends_ibfk_1');
        });
    }
}
