<?php

namespace App\Repositories\User;


use Api\Http\Requests\v1\UserRequest;
use App\Models\User;
use DomainException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
