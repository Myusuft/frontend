<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToProjectVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_videos', function (Blueprint $table) {
            //
            $table->foreign('project_id', 'project_videos_ibfk_1')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_videos', function (Blueprint $table) {
            //
            $table->dropForeign('project_videos_ibfk_1');
        });
    }
}
