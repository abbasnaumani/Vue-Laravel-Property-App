<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('actor_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->unsignedBigInteger('statement_id');
            $table->integer('record_id');
            $table->timestamps();
            $table->foreign('statement_id')->references('id')->on('activity_statements')->onDelete('cascade');
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
        Schema::dropIfExists('activity_logs');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
