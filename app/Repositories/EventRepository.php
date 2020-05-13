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

    public function __construct(Event $event, DateTime $datetime)
    {
        $this->event = $event;
        $this->datetime = Carbon::today();
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
            ->get();
    }

    public function getEventsByLocation()
    {
        // TODO: Implement getEventsByLocation() method.
    }

    public function getEventsByDate()
    {
        // TODO: Implement getEventsByDate() method.
    }

    public function allNotExpired()
    {
        return $this->event::where('datetime', '>=', $this->datetime);
    }
}
