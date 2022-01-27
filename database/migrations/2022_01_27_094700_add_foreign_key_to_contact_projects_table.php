<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToContactProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_projects', function (Blueprint $table) {
            //
            $table->foreign('user_id', 'contact_projects_ibfk_1')->references('id')->on('users');
            $table->foreign('project_id', 'contact_projects_ibfk_2')->references('id')->on('projects');
            $table->foreign('developer_id', 'contact_projects_ibfk_3')->references('id')->on('developers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_projects', function (Blueprint $table) {
            //
            $table->dropForeign('contact_projects_ibfk_1');
            $table->dropForeign('contact_projects_ibfk_2');
            $table->dropForeign('contact_projects_ibfk_3');
        });
    }
}
