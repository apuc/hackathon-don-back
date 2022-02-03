<?php

namespace App\Repositories\Petition;


use Api\Http\Requests\v1\IncidentCategoryPetitionRequest;
use App\Models\IncidentCategoryPetition;

class IncidentCategoryPetitionRepository
{
    protected IncidentCategoryPetition $model;

    public function __construct(IncidentCategoryPetition $model)
    {
        $this->model = $model;
    }

    public function create(IncidentCategoryPetitionRequest $request): ?IncidentCategoryPetition
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
