<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('property_type_id')->index('property_type_id');
            $table->unsignedBigInteger('project_id')->index('project_id');
            $table->string('unit_code', 191);
            $table->string('title', 191);
            $table->string('type', 191);
            $table->text('description')->nullable();
            $table->string('province', 191);
            $table->string('city', 191);
            $table->string('district', 191);
            $table->text('address');
            $table->string('postal_code', 191);
            $table->unsignedInteger('surface_area');
            $table->unsignedInteger('building_area')->nullable();
            $table->unsignedTinyInteger('floor');
            $table->unsignedTinyInteger('bedroom')->nullable();
            $table->unsignedTinyInteger('bathroom')->nullable();
            $table->unsignedTinyInteger('garage')->nullable();
            $table->unsignedTinyInteger('cartport')->nullable();
            $table->longText('specifications');
            $table->unsignedInteger('price');
            $table->string('power_supply', 191)->nullable();
            $table->string('water_type', 191)->nullable();
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
        Schema::dropIfExists('units');
    }
}
