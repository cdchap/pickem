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
            $table->unsignedBigInteger('api_id');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('season')->references('season')->on('seasons');
            $table->string('channel')->nullable();
            $table->dateTimeTz('start_date', 0);
            $table->unsignedBigInteger('home_id')->references('api_id')->on('teams')->nullable();
            $table->unsignedBigInteger('visitor_id')->references('api_id')->on('teams')->nullable();
            $table->unsignedBigInteger('home_score')->default(0);
            $table->unsignedBigInteger('visitor_score')->default(0);
            $table->unsignedBigInteger('winner_id')->references('api_id')->on('teams')->nullable();
            $table->boolean('semi_final')->default(false);
            $table->boolean('championship')->default(false);
            $table->unsignedBigInteger('home_quarter_one_score')->nullable();
            $table->unsignedBigInteger('home_quarter_two_score')->nullable();
            $table->unsignedBigInteger('home_quarter_three_score')->nullable();
            $table->unsignedBigInteger('home_quarter_four_score')->nullable();
            $table->unsignedBigInteger('visitor_quarter_one_score')->nullable();
            $table->unsignedBigInteger('visitor_quarter_two_score')->nullable();
            $table->unsignedBigInteger('visitor_quarter_three_score')->nullable();
            $table->unsignedBigInteger('visitor_quarter_four_score')->nullable();
            $table->timestamps();

            $table->index('api_id');
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
