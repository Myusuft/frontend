<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPropertyVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_videos', function (Blueprint $table) {
            //
            $table->foreign('property_id', 'property_videos_ibfk_1')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_videos', function (Blueprint $table) {
            //
            $table->dropForeign('property_videos_ibfk_1');
        });
    }
}
