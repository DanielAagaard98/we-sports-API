<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\SportRepositoryInterface;

class SportController extends Controller
{
    private $sportRepository;

    public function __construct(SportRepositoryInterface $sportRepository)
    {
        $this->sportRepository = $sportRepository;
    }

    public function all()
    {
        return response()->json($this->sportRepository->all());
    }

    public function getSportById(int $sportId)
    {
        $sport = $this->sportRepository->getSportById($sportId);
        return response()->json($sport);
    }
}
