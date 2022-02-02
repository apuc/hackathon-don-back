<?php

namespace App\Repositories\Petition;

use Api\Http\Requests\v1\PetitionRequest;
use App\Models\Petition;

class PetitionRepository
{
    /**
     * @var Petition
     */
    protected $model;

    /**
     * @param Petition $petition
     */
    public function __construct(Petition $petition)
    {
        $this->model = $petition;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * @param int $user_id
     * @return mixed
     */
    public function findByUserId(int $user_id)
    {
        return $this->model::where('user_id','=', $user_id)->get();
    }

    /**
     * @param PetitionRequest $request
     * @return Petition
     */
    public function create(PetitionRequest $request): Petition
    {
        $this->model->fill($request->all());

        if ($this->model->save()) {
            return $this->model;
        }
        throw new \DomainException('Saving error');
    }
}
