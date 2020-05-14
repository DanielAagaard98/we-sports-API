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
        //No estoy seguro si este necesita ser tambien por datetime
        return $this->event::find($eventId)
            ->where('datetime', '>=', $this->datetime);
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
            ->where('datetime', '>=', $this->datetime)
            ->get();
    }

    public function getEventsBySport(int $sportId)
    {
        return $this->event::where('sport_id', '=', $sportId)
            ->where('datetime', '>=', $this->datetime)
            ->get();
    }

    public function getEventsByLocation(string $city)
    {
        return $this->event::where('city', 'like', $city)
            ->where('datetime', '>=', $this->datetime)
            ->get();
    }

    public function getEventsByDate(DateTime $datetime)
    {
        return $this->event::where('datetime', '>=', $this->datetime)
            ->get();
    }

    public function allNotExpired()
    {
        return $this->event::where('datetime', '>=', $this->datetime)
            ->get();
    }
}
