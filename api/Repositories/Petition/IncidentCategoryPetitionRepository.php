<?php

namespace Api\Repositories\Petition;


use Api\Http\Requests\v1\IncidentCategoryRequest;
use App\Models\IncidentCategoryPetition;

class IncidentCategoryPetitionRepository
{
    public function create(IncidentCategoryRequest $request)
    {
        $model = new IncidentCategoryPetition();
        $model->fill($request->all());

        if ($model->save()) {
            return $model;
        }
        else {
            throw new \DomainException('Saving error');
        }
    }
}
