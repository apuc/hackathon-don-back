<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Http\Requests\v1\User\Notification\CheckAuthCodeRequest;
use Api\Http\Requests\v1\User\Notification\SendAuthCodeRequest;
use Api\Http\Requests\v1\UserRequest;
use Api\Http\Resources\v1\UserResource;
use Api\Repositories\User\UserRepository;
use Api\Services\Petition\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;


class UserController extends Controller
{
    protected $userService;
    protected $userRepository;

    /**
     * @param UserService $userService
     * @param UserRepository $userRepository
     */
    public function __construct(UserService $userService, UserRepository $userRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }

    /**
     * @param $userId
     * @return JsonResponse
     */
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

    /**
     * @param UserRequest $userRequest
     * @return array|void
     */
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
            abort(500, $e->getMessage());
        }
    }

    /**
     * @param SendAuthCodeRequest $userNotificationRequest
     * @return Application|ResponseFactory|JsonResponse|\Illuminate\Http\Response
     */
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

    /**
     * @param CheckAuthCodeRequest $request
     * @return Application|ResponseFactory|JsonResponse|\Illuminate\Http\Response
     */
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
