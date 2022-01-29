<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('property_type_id')->index('property_type_id');
            $table->unsignedBigInteger('developer_id')->index('developer_id');
            $table->string('project_code', 191);
            $table->string('listing_package_type', 191)->default('Basic');
            $table->string('title', 191);
            $table->string('subtitle', 191);
            $table->text('description')->nullable();
            $table->longText('design')->nullable();
            $table->unsignedInteger('price_start');
            $table->unsignedInteger('price_final');
            $table->string('province', 191);
            $table->string('city', 191);
            $table->string('district', 191);
            $table->text('address');
            $table->string('postal_code', 191);
            $table->double('longitude', 10, 7);
            $table->double('latitude', 10, 7);
            $table->string('certificate', 191);
            $table->string('siteplan_link', 191)->nullable();
            $table->string('apps_link', 191)->nullable();
            $table->unsignedInteger('view_count')->default(0);
            $table->time('completed_at')->nullable();
            $table->string('status', 191);
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
        Schema::dropIfExists('projects');
    }
}
