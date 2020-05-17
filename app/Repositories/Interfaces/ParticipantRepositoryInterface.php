<?php


namespace App\Repositories\Interfaces;


interface ParticipantRepositoryInterface
{
    public function all();
    public function getParticipantsByEvent(int $eventId);
    public function addParticipant(array $data);
}
