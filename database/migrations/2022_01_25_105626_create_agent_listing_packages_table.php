<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentListingPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_listing_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('agent_type_id')->index('agent_type_id');
            $table->unsignedBigInteger('listing_package_id')->index('listing_package_id');
            $table->unsignedSmallInteger('value');
            $table->unsignedTinyInteger('deadline')->nullable();
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
        Schema::dropIfExists('agent_listing_packages');
    }
}
