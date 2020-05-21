<?php


namespace App\Repositories\Interfaces;


interface ParticipantRepositoryInterface
{
    public function all();
    public function getParticipantsByEvent(int $eventId);
    public function addParticipant(array $data);
    public function deleteParticipant(int $participantId);
    public function participating(int $user_id, int $event_id);
}
