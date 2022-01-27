<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToUnitVirtualToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unit_virtual_tours', function (Blueprint $table) {
            //
            $table->foreign('unit_id', 'unit_virtual_tours_ibfk_1')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unit_virtual_tours', function (Blueprint $table) {
            //
            $table->dropForeign('unit_virtual_tours_ibfk_1');
        });
    }
}
