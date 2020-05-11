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
        // TODO: Implement all() method.
    }

    public function getEventById()
    {
        // TODO: Implement getEventById() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
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
