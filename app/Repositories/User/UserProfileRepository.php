<?php

namespace App\Repositories\User;

use Api\Http\Requests\v1\User\UserProfileRequest;
use App\Models\UserProfile;

class UserProfileRepository
{
    /**
     * @var UserProfile
     */
    protected UserProfile $model;

    /**
     * @param UserProfile $profile
     */
    public function __construct(UserProfile $profile)
    {
        $this->model = $profile;
    }

    /**
     * @param UserProfileRequest $request
     * @return UserProfile
     */
    public function create(UserProfileRequest $request): ?UserProfile
    {
        $this->model->fill($request->all());

        if ($this->model->save()) {
            return $this->model;
        }
        else {
            throw new \DomainException('Saving error');
        }
    }
}
