<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToFavoritePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('favorite_properties', function (Blueprint $table) {
            //
            $table->foreign('user_id', 'favorite_properties_ibfk_1')->references('id')->on('users');
            $table->foreign('property_id', 'favorite_properties_ibfk_2')->references('id')->on('properties');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favorite_properties', function (Blueprint $table) {
            //
            $table->dropForeign('favorite_properties_ibfk_1');
            $table->dropForeign('favorite_properties_ibfk_2');
        });
    }
}
