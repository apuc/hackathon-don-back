<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Http\Requests\v1\User\Notification\CheckAuthCodeRequest;
use Api\Http\Requests\v1\User\Notification\SendAuthCodeRequest;
use Api\Http\Requests\v1\UserRequest;
use Api\Http\Resources\v1\UserResource;
use Api\Repositories\User\UserRepository;
use Api\Services\Petition\UserService;
use App\Http\Controllers\Controller;
use App\Notifications\AuthLoginNotification;
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

    public function show($userId): JsonResponse
    {
        $user = $this->userRepository->findById($userId);

        if (!$user) {
            return response()->json('User not found', 404);
        }

        return response()->json(
            [
                'success' => true,
                'data'    => UserResource::make($user)
            ]);
    }

    public function store(UserRequest $userRequest)
    {
        try {
            $user = $this->userService->create($userRequest);

            $token = $user->createToken('Laravel Password Grant Client')->accessToken;

            return [
                'user'  => $user,
                'token' => $token
            ];
        } catch (\Throwable $e) {
            abort(500);
        }
    }

    public function sendAuthCode(SendAuthCodeRequest $userNotificationRequest)
    {
        $recipient = $userNotificationRequest['recipient'];
        $user = $this->userRepository->findByEmail($recipient) ?? $this->userRepository->findByPhone($recipient);

        if (!$user) {
            return response()->json('User not found', 404);
        }
//TODO ---------------------------------
        return response(['user_id' => $user->id], 200);

        $code = mt_rand(1000, 9999);

        $user->notify((new AuthLoginNotification($code)));

        return response(['user_id' => $user->id], 200);
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
            $response = [ 'token' => $token ];

            return response($response, 200);
        }

        $response = ["message" =>'User does not exist'];
        return response($response, 422);
    }
}
