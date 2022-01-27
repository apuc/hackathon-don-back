<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Repositories\User\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected $userRepository;
    protected $userService;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show($user_id): JsonResponse
    {
        $user = $this->userRepository->findById($user_id);

        if (empty($user)) {
            return response()->json('User not found', 404);
        }

        return response()->json(['success' => true,
            'data' => $user
        ]);
    }
}
