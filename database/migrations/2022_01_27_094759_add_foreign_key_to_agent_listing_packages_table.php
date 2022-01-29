<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToAgentListingPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agent_listing_packages', function (Blueprint $table) {
            //
            $table->foreign('agent_type_id', 'agent_listing_packages_ibfk_1')->references('id')->on('agent_types');
            $table->foreign('listing_package_id', 'agent_listing_packages_ibfk_2')->references('id')->on('listing_packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agent_listing_packages', function (Blueprint $table) {
            //
            $table->dropForeign('agent_listing_packages_ibfk_1');
            $table->dropForeign('agent_listing_packages_ibfk_2');
        });
    }
}
