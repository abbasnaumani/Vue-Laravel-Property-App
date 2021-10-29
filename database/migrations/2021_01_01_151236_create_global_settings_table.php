<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_settings', function (Blueprint $table) {
            $table->id();
            $table->string('display_name');
            $table->string('field_name');
            $table->text('value');
            $table->string('comments')->nullable();
            $table->enum('value_type', ['0', '1','2'])->default('0')->comment('0=string,1=integer,2=radio_button');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('global_settings');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
