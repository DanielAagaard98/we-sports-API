<?php


namespace App\Repositories\Interfaces;


interface EventRepositoryInterface
{
    public function all();
    public function getEventById();
    public function update();
    public function delete();
    public function getEventsByUser();
    public function getEventsByCategory();
    public function getEventsByLocation();
    public function getEventsByDate();
}
