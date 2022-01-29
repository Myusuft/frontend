<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('districts', function (Blueprint $table) {
            $table->foreign('city_id', 'districts_ibfk_1')->references('id')->on('cities');
            $table->foreign('province_id', 'districts_ibfk_2')->references('id')->on('provinces');
            $table->foreign('area_detail_id', 'districts_ibfk_3')->references('id')->on('area_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('districts', function (Blueprint $table) {
            $table->dropForeign('districts_ibfk_1');
            $table->dropForeign('districts_ibfk_2');
            $table->dropForeign('districts_ibfk_3');
        });
    }
}
