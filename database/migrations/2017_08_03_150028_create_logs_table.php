<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id')->unsigned();
            $table->integer('attacker_team')->unsigned();
            $table->integer('defender_team')->unsigned();
            $table->integer('attacker_id')->unsigned();
            $table->integer('assist_id')->unsigned()->nullable();
            $table->integer('defender_id')->unsigned();
            $table->string('status');
            $table->integer('type');
            $table->string('message');
            $table->integer('time');
        });
        Schema::table('logs', function(Blueprint $table) {
            $table->foreign('attacker_id')->references('id')->on('players');
            $table->foreign('assist_id')->references('id')->on('players');
            $table->foreign('defender_id')->references('id')->on('players');
            $table->foreign('match_id')->references('id')->on('matches');
            $table->foreign('attacker_team')->references('id')->on('teams');
            $table->foreign('defender_team')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
