<?php

namespace App\Repositories\User;

use Api\Http\Requests\v1\UserProfileRequest;
use App\Models\UserProfile;

class UserProfileRepository
{
    /**
     * @var UserProfile
     */
    protected $model;

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
}
