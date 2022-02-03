<?php

namespace App\Repositories\User;

use Api\Http\Requests\v1\User\UserRolesRequest;
use App\Models\UserRoles;

class UserRolesRepository
{
    protected UserRoles $model;

    public function __construct(UserRoles $model)
    {
        $this->model = $model;
    }

    public function create(UserRolesRequest $request)
    {
        $model = new UserRoles();
        $model->fill($request->all());

        if ($model->save()) {
            return $model;
        }
        throw new \DomainException('Saving error');
    }
}
