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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('property_sub_type_id');
            $table->unsignedBigInteger('area_unit_id');
            $table->unsignedBigInteger('location_id');
            $table->tinyInteger('is_featured');
            $table->string('title');
            $table->double('area');
            $table->tinyInteger('purpose');
            $table->double('price');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('property_sub_type_id')->references('id')->on('property_sub_types')->onDelete('cascade');
            $table->foreign('area_unit_id')->references('id')->on('area_units')->onDelete('cascade');

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
        Schema::dropIfExists('properties');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
