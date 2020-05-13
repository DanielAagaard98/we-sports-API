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

    public function getParticipantsByEvent()
    {
        return $this->participant::where()
            ->join()
            ->select()
            ->get();
    }
}
