<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToProjectInfrastructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_infrastructures', function (Blueprint $table) {
            //
            $table->foreign('project_id', 'project_infrastructures_ibfk_1')->references('id')->on('projects');
            $table->foreign('infrastructure_type_id', 'project_infrastructures_ibfk_2')->references('id')->on('infrastructure_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_infrastructures', function (Blueprint $table) {
            //
            $table->dropForeign('project_infrastructures_ibfk_1');
            $table->dropForeign('project_infrastructures_ibfk_2');
        });
    }
}
