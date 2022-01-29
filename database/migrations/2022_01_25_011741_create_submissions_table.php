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
            $table->unsignedBigInteger('user_id')->index('user_id');
            $table->string('name', 191);
            $table->string('email', 191);
            $table->string('phone', 20);
            $table->string('neceessity', 191);
            $table->string('status', 191);
            $table->string('package', 191)->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->text('note_user')->nullable();
            $table->text('note_management')->nullable();
            $table->string('submission_for', 191)->nullable();
            $table->date('expired_at')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at', 0)->nullable()->default(null);
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
