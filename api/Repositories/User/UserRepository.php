<?php

namespace Api\Repositories\User;


use Api\Http\Resources\v1\UserResource;
use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function findById(int $user_id)
    {
        return UserResource::make(
            $this->model::with([
                'userProfile',
            ])->find($user_id));
    }
}
