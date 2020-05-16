<?php


namespace App\Repositories\Interfaces;


interface UserRepositoryInterface
{
    public function all();
    public function getUserById(int $userId);
    public function getUserByNickname(string $nickname);
}
