<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable(false)->index('user_id');
            $table->string('name', 191)->nullable(false);
            $table->string('email', 191)->nullable(false);
            $table->string('phone', 20)->nullable(false);
            $table->string('neceessity', 191)->nullable(false);
            $table->string('status', 191)->nullable(false);
            $table->string('package', 191)->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->text('note_user')->nullable();
            $table->text('note_management')->nullable();
            $table->string('submission_for', 191)->nullable();
            $table->date('expired_at')->nullable();
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
        Schema::dropIfExists('submissions');
    }
}
