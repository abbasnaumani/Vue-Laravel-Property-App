<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->tinyInteger('is_central_air_conditioning')->default(0)->nullable();
            $table->tinyInteger('is_central_heating')->default(0)->nullable();
            $table->tinyInteger('is_furnished')->default(0)->nullable();
            $table->string('other_facilities')->nullable();
            $table->timestamps();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('property_features');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
