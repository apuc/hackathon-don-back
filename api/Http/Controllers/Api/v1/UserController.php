<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Http\Requests\v1\User\Notification\CheckAuthCodeRequest;
use Api\Http\Requests\v1\User\Notification\SendAuthCodeRequest;
use Api\Http\Requests\v1\User\UserRequest;
use Api\Http\Resources\v1\UserResource;
use Api\Services\Petition\UserService;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected UserService $userService;
    protected UserRepository $userRepository;

    public function __construct(
        UserService    $userService,
        UserRepository $userRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }

    public function show($userId): JsonResponse
    {
        $user = $this->userRepository->findById($userId);

        if (!$user) {
            return response()->json('User not found', 404);
        }

        return response()->json([
            'success' => true,
            'data' => UserResource::make($user)
        ]);

    }

    public function store(UserRequest $userRequest): JsonResponse
    {
        try {
            $user = $this->userService->create($userRequest);

            $token = $user->createToken('Laravel Password Grant Client')->accessToken;

            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        } catch (\Throwable $e) {
            abort(500, $e->getMessage());
        }
    }

    public function sendAuthCode(SendAuthCodeRequest $userNotificationRequest): JsonResponse
    {
        $recipient = $userNotificationRequest['recipient'];
        $user = $this->userRepository->findByEmail($recipient) ?? $this->userRepository->findByPhone($recipient);

        if (!$user) {
            return response()->json('User not found', 404);
        }
//TODO ---------------------------------
        return response()->json([
            'user_id' => $user->id
        ]);

        $code = mt_rand(1000, 9999);

        $user->notify((new AuthLoginNotification($code))->delay(now()->addSeconds(10)));

        return response()->json([
            'user_id' => $user->id
        ]);
    }

    public function checkAuthCode(CheckAuthCodeRequest $request)
    {
        $user = $this->userRepository->findById($request['user_id']);

        if (!$user) {
            return response()->json('User not found', 404);
        }
//TODO ---------------------------------
        if (1234 === (int)$request['code']) {
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            $response = ['token' => $token];

            return response($response, 200);
        }

        $response = ["message" => 'User does not exist'];

        return response($response, 422);
    }
}
