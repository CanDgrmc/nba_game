<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id');
            $table->integer('team1');
            $table->integer('team2');
            $table->integer('quarter_number');
            $table->integer('team1_point');
            $table->integer('team2_point');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_stats');
    }
}
