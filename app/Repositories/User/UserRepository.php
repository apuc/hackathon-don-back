<?php

namespace App\Repositories\User;

use Api\Http\Requests\v1\User\UserRequest;
use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

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

    public function findById(int $userId): ?User
    {
        return $this->model::with([
            'userProfile',
        ])->find($userId);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->model::query()->where(['email' => $email])->first();
    }

    public function findByPhone(string $phone): ?User
    {
        return $this->model::query()->where(['phone' => $phone])->first();
    }
}
