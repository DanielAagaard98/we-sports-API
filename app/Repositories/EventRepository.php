<?php


namespace App\Repositories;


/**
 * 1. && de fecha al filtro
 * 2. ciudad Like
 * 3. Función like usuario.
 * 4. triple join participantes
 */

use App\Event;
use App\Repositories\Interfaces\EventRepositoryInterface;
use Carbon\Carbon;
use DateTime;

class EventRepository implements EventRepositoryInterface
{
    private $event;
    private $datetime;

    public function __construct(Event $event)
    {
        $this->event = $event;
        $this->datetime = Carbon::now();
    }

    public function all()
    {
        return $this->event::all();
    }

    public function getEventById(int $eventId)
    {
        return $this->event::find($eventId);
    }

    public function create(array $data)
    {
        return $this->event::create($data);
    }

    public function update(array $data, int $eventId)
    {
        return $this->event::findOrFail($eventId)
            ->update($data);
    }

    public function delete(int $eventId)
    {
        return $this->event::find($eventId)->delete();
    }

    public function getEventsByUser(int $userId)
    {
        return $this->notExpiredEventsCompleteInfo()
            ->where('creator_id', '=', $userId);
    }

    ///PODRIA SOBRAR
    public function getEventsBySport(int $sportId)
    {
        return $this->notExpiredEventsCompleteInfo()
            ->where('sport_id', '=', $sportId);
    }
    ///PODRIA SOBRAR
    public function getEventsByLocation(string $city)
    {
        return $this->event::where('city', 'like', $city)
            ->where('datetime', '>=', $this->datetime)
            ->paginate(20)
            ->get();
    }
    ///PODRIA SOBRAR
    public function getEventsByDate(DateTime $datetime)
    {
        return $this->event::where('datetime', '=', $this->datetime)
            ->paginate(20)
            ->get();
    }

    public function highlightedEvents()
    {
        return $this->notExpiredEventsCompleteInfo()
            ->sortByDesc('max_participants')
            ->take(10);

    }

    public function notExpiredEventsCompleteInfo()
    {
        return $this->event::where('datetime', '>=', $this->datetime)
            ->select('events.*', 'users.nickname', 'sports.name')
            ->join('sports', 'events.sport_id', '=', 'sports.id')
            ->join('users', 'events.creator_id', '=', 'users.id')
            ->sortBy('datetime')
            ->get();
    }

    public function filteredEvents(?int $sportId, ?int $creatorId, ?string $city, ?string $date)
    {
        $query = $this->event::query()
            ->select('events.*', 'users.nickname', 'sports.name')
            ->join('sports', 'events.sport_id', '=', 'sports.id')
            ->join('users', 'events.creator_id', '=', 'users.id');

        if (!is_null($sportId)){
            $query->where('sport_id', '=', $sportId);
        }
        if (!is_null($creatorId)) {
            $query->where('creator_id', '=', $creatorId);
        }
        if (!is_null($city)){
            $city = str_replace('_', ' ', $city);
            $query->where('events.city', 'like', $city);
        }
        if (!is_null($date)){
            $date = Carbon::parse($date);
            $query->whereDate('datetime', '=', $date);
        }
        return $query->get();
    }
}
