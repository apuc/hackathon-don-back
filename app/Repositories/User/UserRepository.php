<?php

namespace App\Repositories\User;

use Api\Http\Requests\v1\User\UserRequest;
use App\Models\User;
use DomainException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository
{
    protected User $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function findById($user_id): ?User
    {
        return $this->model->find($user_id);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->model::query()->where('email', '=', $email)->first();
    }

    public function findByPhone(string $phone): ?User
    {
        return $this->model::query()->where('phone', '=', $phone)->first();
    }

    public function create(UserRequest $request): ?User
    {
        $this->model->fill(array(
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
            'email' => $request['email'],
            'phone' => $request['phone'],
            'confirm_sms_code' => Str::random(4),
            'confirm_email_code' => Str::random(4),
        ));

        if ($this->model->save()) {
            return $this->model;
        }

        throw new DomainException('User save error');
    }
}
