<?php

namespace Api\Repositories\Petition;

use Api\Http\Requests\PetitionRequest;
use App\Models\Petition;

class PetitionRepository
{
    protected $model;

    public function __construct(Petition $petition)
    {
        $this->model = $petition;
    }

    public function create(PetitionRequest $request): Petition
    {
        $this->model->fill($request->all());

        if ($this->model->save()) {
            return $this->model;
        }
        else {
            throw new \DomainException('Saving error');
        }

//        $this->model->user_id = $request->user_id;
//        $this->model->address_id = $request->address_id;
//        $this->model->status = $request->status;
//        $this->model->description = $request->description;

//        return $this->model::create([
//            'title' => $request->title,
//            'slug' => $request->slug,
//            'status' => $request->status,
//            'type' => $request->type,
//            'private' => $request->private,
//            'avatar_id' => $request->avatar
//        ]);
    }

    public function update(PetitionRequest $request, Petition $petition)
    {
        $this->model->fill($request->all());

        if ($this->model->save()) {
            return $this->model;
        }
        else {
            throw new \DomainException('Update error');
        }
    }

    public function destroy(Petition $petition): bool
    {
        if ($petition->delete()) {
            return true;
        }

        throw new \DomainException('Error deleting petition');
    }

    public function findById(int $id)
    {
        return $this->model::find($id);
    }

//    public function findByUserId(int $id) //:?Channel
//    {
//
//    }
//
//    public function findLast(int $num = 3) //:?Channel
//    {
//
//    }
}
