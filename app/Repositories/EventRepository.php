<?php


namespace App\Repositories;


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
        return $this->event::where('creator_id', '=', $userId)
            ->get();
    }

    public function getEventsBySport(int $sportId)
    {
        return $this->event::where('sport_id', '=', $sportId)
            ->where('datetime', '>=', $this->datetime)
            ->paginate(20)
            ->get();
    }

    public function getEventsByLocation(string $city)
    {
        return $this->event::where('city', 'like', $city)
            ->where('datetime', '>=', $this->datetime)
            ->paginate(20)
            ->get();
    }

    public function getEventsByDate(DateTime $datetime)
    {
        return $this->event::where('datetime', '=', $this->datetime)
            ->paginate(20)
            ->get();
    }

    public function highlightedEvents()
    {
        return $this->event::where('datetime', '>=', $this->datetime)
            ->select('events.*', 'users.nickname', 'sports.name')
            ->join('sports', 'events.sport_id', '=', 'sports.id')
            ->join('users', 'events.creator_id', '=', 'users.id')
            ->orderBy('events.max_participants', 'desc')
            ->take(10)
            ->get();

    }

    public function notExpiredEventsCompleteInfo()
    {
        return $this->event::where('datetime', '>=', $this->datetime)
            ->select('events.*', 'users.nickname', 'sports.name')
            ->join('sports', 'events.sport_id', '=', 'sports.id')
            ->join('users', 'events.creator_id', '=', 'users.id')
            ->get();
    }
}
