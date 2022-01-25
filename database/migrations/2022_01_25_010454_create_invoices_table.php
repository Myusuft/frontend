<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable(false)->index('user_id');
            $table->string('invoice_code', 191)->nullable(false);
            $table->string('name', 191)->nullable(false);
            $table->string('email', 191)->nullable(false);
            $table->string('phone', 20)->nullable(false);
            $table->string('status', 191)->nullable(false);
            $table->text('address')->nullable();
            $table->string('pay_method', 191)->nullable(false);
            $table->string('package', 191)->nullable(false);
            $table->unsignedInteger('validity_periode')->nullable(false);
            $table->string('role_for', 191)->nullable(false);
            $table->text('note')->nullable();
            $table->unsignedInteger('price')->nullable(false);
            $table->float('discount')->nullable(false);
            $table->unsignedInteger('tpta;')->nullable(false);
            $table->date('expired_package_at')->nullable(false);
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
        Schema::dropIfExists('invoices');
    }
}
