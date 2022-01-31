<?php

namespace App\Repositories\User;


use Api\Http\Requests\v1\UserRequest;
use Api\Http\Resources\v1\UserResource;
use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function show($user_id)
    {
        return $this->model->find($user_id);
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

    public function findById(int $user_id)
    {
        return UserResource::make(
            $this->model::with([
                'userProfile',
            ])->find($user_id));
    }
}
