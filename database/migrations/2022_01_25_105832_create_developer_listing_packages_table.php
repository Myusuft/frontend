<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloperListingPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_listing_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('developer_type_id')->index('developer_type_id');
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
        Schema::dropIfExists('developer_listing_packages');
    }
}
