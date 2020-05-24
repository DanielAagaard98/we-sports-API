<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNewParticipantTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            'CREATE TRIGGER check_participants BEFORE INSERT ON participants
             FOR EACH ROW
             BEGIN
                DECLARE max_event_participants INT;
                DECLARE curr_event_participants INT;
                SET max_event_participants = (SELECT max_participants FROM events where id = NEW.event_id);
                set curr_event_participants = (SELECT current_participants FROM events where id = NEW.event_id);
                IF curr_event_participants < max_event_participants THEN
                    UPDATE events SET current_participants = current_participants + 1 where id = NEW.event_id;
                ELSE
                SIGNAL SQLSTATE \'20001\'
                                SET MESSAGE_TEXT = \'Evento lleno\';
                END IF;
             END;'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
