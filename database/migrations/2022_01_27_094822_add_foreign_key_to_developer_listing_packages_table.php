<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToDeveloperListingPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('developer_listing_packages', function (Blueprint $table) {
            //
            $table->foreign('developer_type_id', 'developer_listing_packages_ibfk_1')->references('id')->on('developer_types');
            $table->foreign('listing_package_id', 'developer_listing_packages_ibfk_2')->references('id')->on('listing_packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('developer_listing_packages', function (Blueprint $table) {
            //
            $table->dropForeign('developer_listing_packages_ibfk_1');
            $table->dropForeign('developer_listing_packages_ibfk_2');
        });
    }
}
