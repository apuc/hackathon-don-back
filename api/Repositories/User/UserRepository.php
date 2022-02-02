<?php

namespace Api\Repositories\User;

use Api\Http\Requests\v1\UserRequest;
use Api\Http\Resources\v1\UserResource;
use App\Models\User;

class UserRepository
{
    protected $model;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param UserRequest $request
     * @return User
     */
    public function create(UserRequest $request)
    {
        $this->model->fill($request->all());

        if ($this->model->save()) {
            return $this->model;
        }
        else {
            throw new \DomainException('Saving error');
        }
    }

    /**
     * @param int $userId
     * @return User|null
     */
    public function findById(int $userId): ?User
    {
        return $this->model::with([
            'userProfile',
        ])->find($userId);
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return $this->model::query()->where(['email' => $email])->first();
    }

    /**
     * @param string $phone
     * @return User|null
     */
    public function findByPhone(string $phone): ?User
    {
        return $this->model::query()->where(['phone' => $phone])->first();
    }
}
