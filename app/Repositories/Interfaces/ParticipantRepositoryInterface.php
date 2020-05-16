<?php


namespace App\Repositories\Interfaces;


interface ParticipantRepositoryInterface
{
    public function all();
    public function getParticipantsByEvent(int $eventId);
}
