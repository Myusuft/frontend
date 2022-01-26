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
            $table->unsignedInteger('large');
            $table->unsignedInteger('population')->nullable();
            $table->unsignedInteger('shopping_center')->nullable();
            $table->unsignedInteger('tourist_attraction')->nullable();
            $table->unsignedInteger('worship_place')->nullable();
            $table->unsignedInteger('income_percapita')->nullable();
            $table->unsignedInteger('park')->nullable();
            $table->unsignedInteger('hospital')->nullable();
            $table->unsignedInteger('school')->nullable();
            $table->unsignedInteger('airport')->nullable();
            $table->unsignedInteger('station')->nullable();
            $table->unsignedInteger('harbor')->nullable();
            $table->unsignedInteger('Image_cover')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at', 0)->nullable()->default(null);
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
