<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToAgentLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agent_languages', function (Blueprint $table) {
            //
            $table->foreign('agent_id', 'agent_languages_ibfk_1')->references('id')->on('agents');
            $table->foreign('language_id', 'agent_languages_ibfk_2')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agent_languages', function (Blueprint $table) {
            //
            $table->dropForeign('agent_languages_ibfk_1');
            $table->dropForeign('agent_languages_ibfk_2');
        });
    }
}
