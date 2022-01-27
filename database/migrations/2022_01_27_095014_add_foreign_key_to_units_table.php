<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('units', function (Blueprint $table) {
            //
            $table->foreign('property_type_id', 'units_ibfk_1')->references('id')->on('property_types');
            $table->foreign('project_id', 'units_ibfk_2')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('units', function (Blueprint $table) {
            //
            $table->dropForeign('units_ibfk_1');
            $table->dropForeign('units_ibfk_2');
        });
    }
}
