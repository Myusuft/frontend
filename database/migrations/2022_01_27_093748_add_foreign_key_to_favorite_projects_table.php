<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToFavoriteProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('favorite_projects', function (Blueprint $table) {
            //
            $table->foreign('user_id', 'favorite_projects_ibfk_1')->references('id')->on('users');
            $table->foreign('project_id', 'favorite_projects_ibfk_2')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favorite_projects', function (Blueprint $table) {
            //
            $table->dropForeign('favorite_projects_ibfk_1');
            $table->dropForeign('favorite_projects_ibfk_2');
        });
    }
}
