<?php


namespace App\Repositories;


use App\Repositories\Interfaces\SportRepositoryInterface;
use App\Sport;

class SportRepository implements SportRepositoryInterface
{
    private $sport;

    public function __construct(Sport $sport)
    {
        $this->sport = $sport;
    }

    public function all()
    {
        return $this->sport::all();
    }

    public function getSportById(int $sportId)
    {
        return $this->sport::find($sportId);
    }
}
