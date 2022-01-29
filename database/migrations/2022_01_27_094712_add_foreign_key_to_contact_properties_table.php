<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToContactPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_properties', function (Blueprint $table) {
            //
            $table->foreign('user_id', 'contact_properties_ibfk_1')->references('id')->on('users');
            $table->foreign('property_id', 'contact_properties_ibfk_2')->references('id')->on('properties');
            $table->foreign('agent_id', 'contact_properties_ibfk_3')->references('id')->on('agents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_properties', function (Blueprint $table) {
            //
            $table->dropForeign('contact_properties_ibfk_1');
            $table->dropForeign('contact_properties_ibfk_2');
            $table->dropForeign('contact_properties_ibfk_3');
        });
    }
}
