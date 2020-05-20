<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\EventRepositoryInterface;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function notExpiredEvents(Request $request)
    {
        $events = null;
        /**
         * Comprobar distintos parametros de get
         * para saber si buscamos por autor, ciudad, deporte?
         */
        if ($request->get('creator')) {
            $creatorId = $request->get('creator');
            $events = $this->eventRepository->getEventsByUser($creatorId);
        } if ($request->get('sport')) {
            $sportId = $request->get('sport');
            $events = $this->eventRepository->getEventsBySport($sportId);
        } elseif ($request->get('city')) {
            $city = $request->get('city');
            $city = $this->parseGetParameterText($city);
            $events = $this->eventRepository->getEventsByLocation($city);
        } else {
            $events = $this->eventRepository->notExpiredEventsCompleteInfo();
        }
        return response()->json($events);
    }

    public function getEventById(int $id)
    {
        $event = $this->eventRepository->getEventById($id);
        return response()->json($event);
    }

    public function parseGetParameterText(string $name): string
    {
        return str_replace('_', ' ', $name);
    }

    public function deleteEvent(int $eventId)
    {
        $success = $this->eventRepository->delete($eventId);
        if ($success) {
            return response()->json([
                'message' => 'Evento eliminado correctamente'
            ], 204);
        }
        return response()->json([
            'message' => 'Algo no ha salido como esperabamos.'
        ]);
    }

    public function updateEvent(Request $request, int $eventId)
    {
        $updatedEvent = $this->eventRepository->update($request->all(), $eventId);
        return response()->json($updatedEvent, 200);

    }

    public function createEvent(Request $request)
    {
        $createdEvent = $this->eventRepository->create($request->all());
        return response()->json($createdEvent, 201);
    }

    public function notExpiredEventsCompleteInfo()
    {
        $events = $this->eventRepository->notExpiredEventsCompleteInfo();

        return response()->json($events);
    }

    public function highlightedEvents()
    {
        $events = $this->eventRepository->highlightedEvents();
        return response()->json($events);
    }

}
