<?php


namespace App\Repositories;


/**
 *
 */

use App\Event;
use App\Repositories\Interfaces\EventRepositoryInterface;
use Carbon\Carbon;

class EventRepository implements EventRepositoryInterface
{
    private $event;
    private $datetime;

    public function __construct(Event $event)
    {
        $this->event = $event;
        $this->datetime = Carbon::now('Europe/Madrid');
    }

    public function all()
    {
        return $this->event::all();
    }

    public function getEventById(int $eventId)
    {
        return $this->notExpiredEventsCompleteInfo()
            ->where('id', '=', $eventId);
    }

    public function create(array $data)
    {
        return $this->event::create($data);
    }

    public function update(array $data, int $eventId)
    {
        $event = $this->event::findOrFail($eventId);
        $event->update($data);
        return $event;
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

    public function highlightedEvents()
    {
        return $this->notExpiredEventsCompleteInfo()
            ->sortByDesc('current_participants')
            ->take(10);
    }

    public function notExpiredEventsCompleteInfo()
    {
        return $this->event::where('datetime', '>=', $this->datetime)
            ->select('users.nickname', 'sports.*', 'events.*')
            ->join('sports', 'events.sport_id', '=', 'sports.id')
            ->join('users', 'events.creator_id', '=', 'users.id')
            ->orderBy('datetime', 'DESC')
            ->get();
    }

    public function filteredEvents(?int $sportId, ?int $creatorId, ?string $city, ?string $date)
    {
        $query = $this->event::query()
            ->select('users.nickname', 'sports.name', 'sports.logo', 'events.*')
            ->join('sports', 'events.sport_id', '=', 'sports.id')
            ->join('users', 'events.creator_id', '=', 'users.id');

        if (!is_null($sportId)) {
            $query->where('sport_id', '=', $sportId);
        }
        if (!is_null($creatorId)) {
            $query->where('creator_id', '=', $creatorId);
        }
        if (!is_null($city)) {
            $city = str_replace('_', ' ', $city);
            $query->where('events.city', 'like', $city);
        }
        if (!is_null($date)) {
            $date = Carbon::parse($date);
            $query->whereDate('datetime', '=', $date);
        }
        return $query->get();
    }
}
