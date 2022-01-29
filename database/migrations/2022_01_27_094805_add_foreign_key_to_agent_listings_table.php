<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToAgentListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agent_listings', function (Blueprint $table) {
            //
            $table->foreign('agent_id', 'agent_listings_ibfk_1')->references('id')->on('agents');
            $table->foreign('listing_package_id', 'agent_listings_ibfk_2')->references('id')->on('listing_packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agent_listings', function (Blueprint $table) {
            //
            $table->dropForeign('agent_listings_ibfk_1');
            $table->dropForeign('agent_listings_ibfk_2');
        });
    }
}
