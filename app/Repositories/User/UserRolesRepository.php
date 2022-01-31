<?php

namespace App\Repositories\User;

use Api\Http\Requests\v1\UserRolesRequest;
use App\Models\UserRoles;

class UserRolesRepository
{
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
