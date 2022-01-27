<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPropertyDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_documents', function (Blueprint $table) {
            //
            $table->foreign('property_id', 'property_documents_ibfk_1')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_documents', function (Blueprint $table) {
            //
            $table->dropForeign('property_documents_ibfk_1');
        });
    }
}
