<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToProjectFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_facilities', function (Blueprint $table) {
            //
            $table->foreign('project_id', 'project_facilities_ibfk_1')->references('id')->on('properties');
            $table->foreign('facility_type_id', 'project_facilities_ibfk_2')->references('id')->on('facility_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_facilities', function (Blueprint $table) {
            //
            $table->dropForeign('project_facilities_ibfk_1');
            $table->dropForeign('project_facilities_ibfk_2');
        });
    }
}
