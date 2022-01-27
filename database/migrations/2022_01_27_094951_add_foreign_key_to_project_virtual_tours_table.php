<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToProjectVirtualToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_virtual_tours', function (Blueprint $table) {
            //
            $table->foreign('project_id', 'project_virtual_tours_ibfk_1')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_virtual_tours', function (Blueprint $table) {
            //
            $table->dropForeign('project_virtual_tours_ibfk_1');
        });
    }
}
