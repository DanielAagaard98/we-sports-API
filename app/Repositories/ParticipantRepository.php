<?php


namespace App\Repositories;


use App\Participant;
use App\Repositories\Interfaces\ParticipantRepositoryInterface;
use phpDocumentor\Reflection\Types\Boolean;

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

    public function delete(int $user_id, int $event_id)
    {
        return $this->participant::where('user_id', '=', $user_id)
            ->where('event_id', '=', $event_id)
            ->delete();
    }

    public function participating(int $user_id, int $event_id)
    {
        $participating = $this->participant::where('user_id', '=', $user_id)
            ->where('event_id', '=', $event_id)
            ->count();
        return $participating;
    }

    public function getAllEventsParticipants(int $user_id)
    {
        return $this->participant::where('user_id', '=', $user_id)
            ->join('events', 'events.id', '=', 'participants.event_id')
            ->join('sports', 'events.sport_id', '=', 'sports.id')
            ->join('users', 'events.creator_id', '=', 'users.id')
            ->select('users.nickname', 'sports.*', 'events.*')
            ->get();
    }
}
