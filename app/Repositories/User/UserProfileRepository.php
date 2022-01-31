<?php

namespace App\Repositories\User;


use Api\Http\Requests\v1\UserProfileRequest;
use Api\Http\Resources\v1\UserResource;
use App\Models\UserProfile;

class UserProfileRepository
{
    protected $model;

    public function __construct(UserProfile $profile)
    {
        $this->model = $profile;
    }

    public function create(UserProfileRequest $request)
    {
        $this->model->fill($request->all());

        if ($this->model->save()) {
            return $this->model;
        }
        else {
            throw new \DomainException('Saving error');
        }
    }

    public function findById(int $user_id)
    {
        return UserResource::make(
            $this->model::with([
                'userProfile',
            ])->find($user_id));
    }
}
