<?php


namespace App\Repositories\Interfaces;


use DateTime;

interface EventRepositoryInterface
{
    public function all();

    public function highlightedEvents();

    public function getEventById(int $eventId);

    public function update(array $data, int $eventId);

    public function create(array $data);

    public function delete(int $eventId);

    public function getEventsByUser(int $userId);

    public function notExpiredEventsCompleteInfo();

    public function filteredEvents(?int $sportId, ?int $creatorId, ?string $city, ?string $date);
}
