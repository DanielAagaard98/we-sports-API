<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        return response()->json($this->userRepository->all());
    }

    public function getUserById(int $userId)
    {
        $user = $this->userRepository->getUserById($userId);
        return response()->json($user);
    }

    public function getUserByNickname(string $nickname)
    {
        $user = $this->userRepository->getUserByNickname($nickname);
        return response()->json($user);
    }


}
