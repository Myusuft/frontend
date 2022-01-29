<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPropertyVirtualToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_virtual_tours', function (Blueprint $table) {
            //
            $table->foreign('property_id', 'property_virtual_tours_ibfk_1')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_virtual_tours', function (Blueprint $table) {
            //
            $table->dropForeign('property_virtual_tours_ibfk_1');
        });
    }
}
