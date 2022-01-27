<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPropertyAdvantagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_advantages', function (Blueprint $table) {
            //
            $table->foreign('property_id', 'property_advantages_ibfk_1')->references('id')->on('properties');
            $table->foreign('advantage_type_id', 'property_advantages_ibfk_2')->references('id')->on('advantage_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_advantages', function (Blueprint $table) {
            //
            $table->dropForeign('property_advantages_ibfk_1');
            $table->dropForeign('property_advantages_ibfk_2');
        });
    }
}
