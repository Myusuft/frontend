<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToUnitPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unit_photos', function (Blueprint $table) {
            //
            $table->foreign('unit_id', 'unit_photos_ibfk_1')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unit_photos', function (Blueprint $table) {
            //
            $table->dropForeign('unit_photos_ibfk_1');
        });
    }
}
