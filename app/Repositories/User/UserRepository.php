<?php

namespace App\Repositories\User;


use Api\Http\Requests\v1\UserRequest;
use App\Models\User;
use DomainException;

class UserRepository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function findById($user_id)
    {
        return $this->model->find($user_id);
    }

    public function create(UserRequest $request)
    {
        $this->model->fill($request->all());

        if ($this->model->save()) {
            return $this->model;
        }
        throw new DomainException('User save error');
    }
}
