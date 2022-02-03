<?php

namespace App\Repositories\Petition;


use Api\Http\Requests\v1\PetitionHashTagRequest;
use App\Models\PetitionHashTag;

class PetitionHashTagRepository
{
    /**
     * @param PetitionHashTagRequest $request
     * @return PetitionHashTag
     */
    public function create(PetitionHashTagRequest $request): ?PetitionHashTag
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
