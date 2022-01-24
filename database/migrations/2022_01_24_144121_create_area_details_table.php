<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('large')->nullable(false);
            $table->unsignedInteger('population');
            $table->unsignedInteger('shopping_center');
            $table->unsignedInteger('tourist_attraction');
            $table->unsignedInteger('worship_place');
            $table->unsignedInteger('income_percapita');
            $table->unsignedInteger('park');
            $table->unsignedInteger('hospital');
            $table->unsignedInteger('school');
            $table->unsignedInteger('airport');
            $table->unsignedInteger('station');
            $table->unsignedInteger('harbor');
            $table->unsignedInteger('Image_cover');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_details');
    }
}
