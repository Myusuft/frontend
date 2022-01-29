<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPropertyInfrastructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_infrastructures', function (Blueprint $table) {
            //
            $table->foreign('property_id', 'property_infrastructures_ibfk_1')->references('id')->on('properties');
            $table->foreign('infrastructure_type_id', 'property_infrastructures_ibfk_2')->references('id')->on('infrastructure_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_infrastructures', function (Blueprint $table) {
            //
            $table->dropForeign('property_infrastructures_ibfk_1');
            $table->dropForeign('property_infrastructures_ibfk_2');
        });
    }
}
