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

    public function addParticipant(Request $request)
    {
        $createParticipant = $this->participantRepository->addParticipant($request->all());
        return response()->json($createParticipant, 201);
    }

    public function deleteParticipant(Request $request)
    {
        $deleteParticipant = $this->participantRepository
            ->delete($request->get('user_id'), $request->get('event_id'));
        return response()->json($deleteParticipant, 201);
    }

    public function participating(Request $request)
    {
        return $this->participantRepository
            ->participating($request->get('user_id'), $request->get('event_id'));
    }

    public function getAllEventsParticipants(Request $request)
    {
        return $this->participantRepository
            ->getAllEventsParticipants($request->get('user_id'));
    }

}
