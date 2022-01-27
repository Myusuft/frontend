<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agents', function (Blueprint $table) {
            //
            $table->foreign('user_id', 'agents_ibfk_1')->references('id')->on('users');
            $table->foreign('agent_type_id', 'agents_ibfk_2')->references('id')->on('agent_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agents', function (Blueprint $table) {
            //
            $table->dropForeign('agents_ibfk_1');
            $table->dropForeign('agents_ibfk_2');
        });
    }
}
