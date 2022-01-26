<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('property_type_id')->index('property_type_id');
            $table->unsignedBigInteger('agent_id')->index('agent_id');
            $table->string('property_code', 191);
            $table->string('listing_type', 191);
            $table->string('listing_package_type', 191)->default('Basic');
            $table->string('title', 191);
            $table->text('description')->nullable();
            $table->string('provinces', 191);
            $table->string('city', 191);
            $table->string('district', 191);
            $table->text('address');
            $table->string('postal_code', 191);
            $table->double('longitude', 10, 7);
            $table->double('latitude', 10, 7);
            $table->unsignedInteger('surface_area');
            $table->unsignedInteger('building_area')->nullable();
            $table->unsignedTinyInteger('floor');
            $table->unsignedTinyInteger('bedroom')->nullable();
            $table->unsignedTinyInteger('bathroom')->nullable();
            $table->unsignedTinyInteger('garage')->nullable();
            $table->unsignedTinyInteger('cartport')->nullable();
            $table->unsignedTinyInteger('maid_bedroom')->nullable();
            $table->unsignedTinyInteger('maid_bathroom')->nullable();
            $table->unsignedInteger('price');
            $table->string('certificate',191);
            $table->string('power_supply', 191)->nullable();
            $table->string('condition',191)->nullable();
            $table->string('water_type',191)->nullable();
            $table->unsignedTinyInteger('phone_line')->nullable();
            $table->boolean('is_furniture')->default(0);
            $table->string('facing',191)->nullable();
            $table->unsignedSmallInteger('year_built')->nullable();
            $table->unsignedInteger('view_count')->default(0);
            $table->string('status',191);
            $table->string('slug', 191)->unique();
            $table->timestamp('showed_at', 0)->nullable()->default(null);
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
        Schema::dropIfExists('properties');
    }
}
