<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('season');
            $table->unsignedBigInteger('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('bowl_id')->references('id')->on('bowls');
            $table->unsignedBigInteger('team_id')->references('id')->on('teams');
            $table->unsignedBigInteger('league_id')->references('id')->on('leagues');
            $table->unsignedBigInteger('confidence')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'bowl_id', 'team_id', 'season']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('picks');
    }
}
