<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable(false)->index('user_id');
            $table->string('fullname', 191)->nullable(false);
            $table->string('phone', 20)->nullable(false);
            $table->string('picture_profile', 191)->nullable();
            $table->string('image_cover', 191)->nullable();
            $table->text('address')->nullable();
            $table->string('city', 191)->nullable(false);
            $table->string('province', 191)->nullable(false);
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
        Schema::dropIfExists('user_datas');
    }
}
