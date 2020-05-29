<?php


namespace App\Repositories\Interfaces;


interface ParticipantRepositoryInterface
{
    public function all();

    public function getParticipantsByEvent(int $eventId);

    public function addParticipant(array $data);

    public function delete(int $user_id, int $event_id);

    public function participating(int $user_id, int $event_id);

    public function getAllEventsParticipants(int $user_id);
}
