<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('province_id', 'cities_ibfk_1')->references('id')->on('provinces');
            $table->foreign('area_detail_id', 'cities_ibfk_2')->references('id')->on('area_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropForeign('cities_ibfk_1');
            $table->dropForeign('cities_ibfk_2');
        });
    }
}
