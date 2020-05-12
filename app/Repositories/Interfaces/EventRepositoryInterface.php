<?php


namespace App\Repositories\Interfaces;


interface EventRepositoryInterface
{
    public function all();
    public function getEventById(int $eventId);
    public function update(array $data, int $eventId);
    public function delete(int $eventId);
    public function getEventsByUser();
    public function getEventsByCategory();
    public function getEventsByLocation();
    public function getEventsByDate();
}
