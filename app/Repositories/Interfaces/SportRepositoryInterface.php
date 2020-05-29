<?php


namespace App\Repositories\Interfaces;


interface SportRepositoryInterface
{
    public function all();

    public function getSportById(int $sportId);
}
