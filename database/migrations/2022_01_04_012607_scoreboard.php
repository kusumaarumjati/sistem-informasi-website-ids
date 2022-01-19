<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Scoreboard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoreboard', function (Blueprint $table){
            $table->integer('id')->primary();
            $table->string('name_home')->nullable()->default('Home');
            $table->string('name_away')->nullable()->default('Away');
            $table->integer('score_home')->nullable()->default(0);
            $table->string('score_away')->nullable()->default(0);
            $table->string('musik')->nullable()->default('');
            // $table->string('audio_state')->nullable()->default('stopped');
            // $table->integer('timer')->nullable()->default(0);
            $table->string('status_waktu')->nullable()->default('stopped');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
