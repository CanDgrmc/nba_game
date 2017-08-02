<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id')->nullable();
            $table->integer('player_id')->unsigned()->nullable();
            $table->integer('points');
            $table->integer('two_points_total');
            $table->integer('two_points_successful');
            $table->integer('three_points_total');
            $table->integer('three_points_successful');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_stats');
    }
}
