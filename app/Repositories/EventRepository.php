<?php


namespace App\Repositories;


use App\Event;
use App\Repositories\Interfaces\EventRepositoryInterface;

class EventRepository implements EventRepositoryInterface
{
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
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
        return $this->event::find($eventId)
            ->update($data);

    }

    public function delete(int $eventId)
    {
        return $this->event::destroy($eventId);
    }

    public function getEventsByUser()
    {
        // TODO: Implement getEventsByUser() method.
    }

    public function getEventsByCategory()
    {
        // TODO: Implement getEventsByCategory() method.
    }

    public function getEventsByLocation()
    {
        // TODO: Implement getEventsByLocation() method.
    }

    public function getEventsByDate()
    {
        // TODO: Implement getEventsByDate() method.
    }


}
