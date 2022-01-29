<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToAgentMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agent_members', function (Blueprint $table) {
            //
            $table->foreign('agent_id', 'agent_members_ibfk_1')->references('id')->on('agents');
            $table->foreign('agent_office_id', 'agent_members_ibfk_2')->references('id')->on('agent_offices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agent_members', function (Blueprint $table) {
            //
            $table->dropForeign('agent_members_ibfk_1');
            $table->dropForeign('agent_members_ibfk_2');
        });
    }
}
