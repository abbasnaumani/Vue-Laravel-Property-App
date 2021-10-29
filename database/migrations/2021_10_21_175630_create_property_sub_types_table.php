<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertySubTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_sub_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_type_id');
            $table->string('name')->unique();
            $table->timestamps();
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_sub_types');
    }
}
