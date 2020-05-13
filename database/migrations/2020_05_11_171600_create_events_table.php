<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('sport_id');
            $table->string('title', 100);
            $table->string('city', 100);
            $table->string('address', 200);
            $table->dateTime('datetime');
            $table->integer('max_participants');
            $table->integer('current_participants');
            $table->text('img');

            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('sport_id')->references('id')->on('sports');
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
        Schema::dropIfExists('events');
    }
}
