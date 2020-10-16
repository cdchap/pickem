<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBowlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bowls', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('season_id')->references('id')->on('seasons');
            $table->string('channel');
            $table->time('kickoff', 0);
            $table->date('date');
            $table->unsignedBigInteger('home_id')->references('id')->on('teams');
            $table->unsignedBigInteger('visitor_id')->references('id')->on('teams');
            $table->unsignedBigInteger('home_score')->default(0);
            $table->unsignedBigInteger('visitor_score')->default(0);
            $table->unsignedBigInteger('winner_id')->references('id')->on('teams')->nullable();
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
        Schema::dropIfExists('bowls');
    }
}
