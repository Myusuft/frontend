<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToDevelopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('developers', function (Blueprint $table) {
            //
            $table->foreign('user_id', 'developers_ibfk_1')->references('id')->on('users');
            $table->foreign('developer_type_id', 'developers_ibfk_2')->references('id')->on('developer_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('developers', function (Blueprint $table) {
            //
            $table->dropForeign('developers_ibfk_1');
            $table->dropForeign('developers_ibfk_2');
        });
    }
}
