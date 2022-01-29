<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToDeveloperListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('developer_listings', function (Blueprint $table) {
            //
            $table->foreign('developer_id', 'developer_listings_ibfk_1')->references('id')->on('developers');
            $table->foreign('listing_package_id', 'developer_listings_ibfk_2')->references('id')->on('listing_packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('developer_listings', function (Blueprint $table) {
            //
            $table->dropForeign('developer_listings_ibfk_1');
            $table->dropForeign('developer_listings_ibfk_2');
        });
    }
}
