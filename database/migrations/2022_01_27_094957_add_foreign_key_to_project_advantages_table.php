<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToProjectAdvantagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_advantages', function (Blueprint $table) {
            //
            $table->foreign('project_id', 'project_advantages_ibfk_1')->references('id')->on('projects');
            $table->foreign('advantage_type_id', 'project_advantages_ibfk_2')->references('id')->on('advantage_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_advantages', function (Blueprint $table) {
            //
            $table->dropForeign('project_advantages_ibfk_1');
            $table->dropForeign('project_advantages_ibfk_2');
        });
    }
}
