<?php


namespace App\Repositories\Interfaces;


interface EventRepositoryInterface
{
    public function all();
    public function allNotExpired();
    public function getEventById(int $eventId);
    public function update(array $data, int $eventId);
    public function create(array $data);
    public function delete(int $eventId);
    public function getEventsByUser(int $userId);
    public function getEventsBySport(int $sportId);
    public function getEventsByLocation();
    public function getEventsByDate();

}
