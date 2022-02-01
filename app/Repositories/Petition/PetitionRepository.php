<?php

namespace App\Repositories\Petition;

use Api\Http\Requests\v1\PetitionRequest;
use App\Models\Petition;

class PetitionRepository
{
    protected $model;

    public function __construct(Petition $petition)
    {
        $this->model = $petition;
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    public function findByUserId(int $user_id)
    {
        return $this->model::where('user_id','=', $user_id)->get();
    }

    public function create(PetitionRequest $request): Petition
    {
        $this->model->fill($request->all());

        if ($this->model->save()) {
            return $this->model;
        }
        throw new \DomainException('Saving error');
    }
}
