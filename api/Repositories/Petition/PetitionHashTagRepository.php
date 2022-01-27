<?php

namespace Api\Repositories\Petition;


use Api\Http\Requests\v1\PetitionHashTagRequest;
use App\Models\Pe;

class PetitionHashTagRepository
{
    protected $model;

    public function __construct(PetitionHashTagRequest $petitionHashTagRequest)
    {
        $this->model = $petitionHashTagRequest;
    }

    public function create(PetitionHashTagRequest $request)//: Address
    {
        $this->model->fill($request->all());

        if ($this->model->save()) {
            return $this->model;
        }
        else {
            throw new \DomainException('Saving error');
        }
    }
}
