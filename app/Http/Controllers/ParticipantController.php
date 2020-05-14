<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ParticipantRepositoryInterface;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    private $participantRepository;

    public function __construct(ParticipantRepositoryInterface $participantRepository)
    {
        $this->participantRepository = $participantRepository;
    }

    public function getParticipantsByEvent(int $eventId)
    {
        $participants = $this->participantRepository->getParticipantsByEvent($eventId);
        return response()->json($participants);
    }
}
