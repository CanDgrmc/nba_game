<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('team_img');
            $table->string('team_name');
            $table->string('team_shortName');
            $table->integer('team_attack_overall');
            $table->integer('team_defence_overall');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Teams');
    }
}
