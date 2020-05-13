<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\EventRepositoryInterface;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }
}
