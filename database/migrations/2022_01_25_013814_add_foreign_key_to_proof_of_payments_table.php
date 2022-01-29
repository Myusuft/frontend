<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToProofOfPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proof_of_payments', function (Blueprint $table) {
            //
            $table->foreign('submission_id', 'proof_of_payments_ibfk_1')->references('id')->on('submissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proof_of_payments', function (Blueprint $table) {
            //
            $table->dropForeign('proof_of_payments_ibfk_1');
        });
    }
}
