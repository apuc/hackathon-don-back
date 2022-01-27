<?php

namespace Api\Repositories\Petition;


use Api\Http\Requests\v1\PetitionHashTagRequest;
use App\Models\PetitionHashTag;

class PetitionHashTagRepository
{
    public function create(PetitionHashTagRequest $request)
    {
        $model = new PetitionHashTag();
        $model->fill($request->all());

        if ($model->save()) {
            return $model;
        }
        else {
            throw new \DomainException('Saving error');
        }
    }
}
