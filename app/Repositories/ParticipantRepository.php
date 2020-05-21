<?php


namespace App\Repositories;


use App\Participant;
use App\Repositories\Interfaces\ParticipantRepositoryInterface;

class ParticipantRepository implements ParticipantRepositoryInterface
{

    private $participant;

    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }

    public function all()
    {
        return $this->participant::all();
    }

    public function getParticipantsByEvent(int $eventId)
    {
        return $this->participant::where('event_id', '=', $eventId)
            ->join('users', 'users.id', '=', 'participants.user_id')
            ->select('users.nickname')
            ->get();
    }

    public function addParticipant($data)
    {
        return $this->participant::create($data);
    }

    public function deleteParticipant(int $participantId)
    {
        return $this->participant::find($participantId)->deleteParticipant();
    }
}
