<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Http\Requests\v1\UserRequest;
use Api\Http\Resources\v1\UserResource;
use Api\Services\Petition\UserService;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\JsonResponse;
use Throwable;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserRepository $userRepository, UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show($user_id)
    {
        $user = $this->userService->show($user_id);

        if (empty($user)) {
            return response()->json('User not found', 404);
        }

        return  response()->json(['success' => true,
            'data' => new UserResource($user)
        ]);
    }

    public function store(UserRequest $userRequest)
    {
        try {
           $user = $this->userService->create($userRequest);
        } catch (Throwable $ex)
        {
            abort(500);
        }

        return  response()->json(['success' => true,
            'data' => new UserResource($user)
        ]);
    }
}
