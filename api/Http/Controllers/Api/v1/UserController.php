<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Http\Requests\v1\UserRequest;
use Api\Repositories\User\UserRepository;
use Api\Services\Petition\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected $userRepository;
    protected $userService;

    public function __construct(UserRepository $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
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

    public function store(UserRequest $userRequest)
    {
//        return response()->json(['success' => true,
//            'data' => $userRequest->post()
//        ]);
        try {
            $user = $this->userService->create($userRequest);

            return $user;
        } catch (\Throwable $e)
        {
            abort(500);
        }
    }
}
