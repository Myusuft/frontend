<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProofOfPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proof_of_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('submission_id')->index('submission_id');
            $table->string('form_user', 191);
            $table->string('form_admin', 191);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proof_of_payments');
    }
}
