<?php

namespace Api\Repositories\Petition;


use Api\Http\Requests\v1\IncidentCategoryPetitionRequest;
use App\Models\IncidentCategoryPetition;

class IncidentCategoryPetitionRepository
{
    public function create(IncidentCategoryPetitionRequest $request)
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
