<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('api_id');
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->string('abbreviation')->nullable();
            $table->string('alt_name1')->nullable();
            $table->string('alt_name2')->nullable();
            $table->string('alt_name3')->nullable();
            $table->string('conference')->nullable();
            $table->string('division')->nullable();
            $table->string('color')->nullable();
            $table->string('alt_color')->nullable();
            $table->string('logo1')->nullable();
            $table->string('logo2')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
