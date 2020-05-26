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

    public function all()
    {
        return $this->user::all();
    }

    public function getUserById(int $userId)
    {
        return $this->user::find($userId);
    }

    public function getUserByNickname(string $nickname)
    {
        return $this->user::where('nickname', '=', $nickname)
            ->get();
    }

    public function updateUser(array $data)
    {
        $userId = $data['id'];
        unset($data['id']);
        return $this->user::findOrFail($userId)
            ->update($data);
    }
}
