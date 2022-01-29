<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToUnitVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unit_videos', function (Blueprint $table) {
            //
            $table->foreign('unit_id', 'unit_videos_ibfk_1')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unit_videos', function (Blueprint $table) {
            //
            $table->dropForeign('unit_videos_ibfk_1');
        });
    }
}
