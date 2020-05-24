<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDeleteParticipantTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            'CREATE TRIGGER check_participants_gt0 BEFORE DELETE ON participants
             FOR EACH ROW
             BEGIN
                DECLARE curr_event_participants INT;
                set curr_event_participants = (SELECT current_participants FROM events where id = OLD.event_id);
                IF curr_event_participants > 0 THEN
                    UPDATE events SET current_participants = current_participants - 1 where id = OLD.event_id;
                ELSE
                SIGNAL SQLSTATE \'20002\'
                                SET MESSAGE_TEXT = \'El evento está vacio\';
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
