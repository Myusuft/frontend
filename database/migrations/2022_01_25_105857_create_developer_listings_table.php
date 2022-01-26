<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloperListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_listings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('developer_id')->index('developer_id');
            $table->unsignedBigInteger('listing_package_id')->index('listing_package_id');
            $table->unsignedSmallInteger('value');
            $table->date('expired_at')->nullable();
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
        Schema::dropIfExists('developer_listings');
    }
}
