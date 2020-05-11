<?php


namespace App\Repositories;


use App\Repositories\Interfaces\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUserById(int $userId)
    {
        // TODO: Implement getUserById() method.
    }
}
