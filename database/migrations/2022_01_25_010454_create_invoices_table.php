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
            $table->unsignedBigInteger('user_id')->index('user_id');
            $table->string('invoice_code', 191);
            $table->string('name', 191);
            $table->string('email', 191);
            $table->string('phone', 20);
            $table->string('status', 191);
            $table->text('address')->nullable();
            $table->string('pay_method', 191);
            $table->string('package', 191);
            $table->unsignedInteger('validity_periode');
            $table->string('role_for', 191);
            $table->text('note')->nullable();
            $table->unsignedInteger('price');
            $table->float('discount');
            $table->unsignedInteger('tpta;');
            $table->date('expired_package_at');
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
        Schema::dropIfExists('invoices');
    }
}
