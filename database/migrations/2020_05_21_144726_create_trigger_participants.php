<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerParticipants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            'CREATE TRIGGER set_first_participant
            AFTER INSERT ON events FOR EACH ROW
            INSERT INTO participants (uid, event_id) VALUES
            (NEW.creator_id, NEW.id)'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger_participants');
    }
}
