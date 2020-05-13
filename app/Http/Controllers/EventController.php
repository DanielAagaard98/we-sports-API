<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\EventRepositoryInterface;

class EventController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function allNotExpired()
    {
        $events = $this->eventRepository->allNotExpired();
        return response()->json($events);
    }

    public function getEventById(int $id)
    {
        $event = $this->eventRepository->getEventById($id);
        return response()->json($event);
    }
}
