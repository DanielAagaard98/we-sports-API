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

    public function all(Request $request)
    {
        if ($request->get('nickname')) {
            $nickname = $request->get('nickname');
            return $this->getUserByNickname($nickname);
        }
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

    public function updateUser(Request $request)
    {
        $updatedUser = $this->userRepository->updateUser($request->all());
        return response()->json($updatedUser, 200);
    }

}
