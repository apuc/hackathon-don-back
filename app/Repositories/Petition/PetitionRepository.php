<?php

namespace App\Repositories\Petition;


use Api\Http\Requests\v1\PetitionRequest;
use Api\Http\Resources\v1\PetitionResource;
use App\Models\Petition;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PetitionRepository
{
    protected $model;

    public function __construct(Petition $petition)
    {
        $this->model = $petition;
    }

    public function findById(int $id)
    {
        return PetitionResource::make(
            $this->model::with([
                'address',
                'mediafile',
                'hashTag',
                'incidentCategory'
            ])->find($id));
    }

    public function findByUserId(int $user_id): AnonymousResourceCollection
    {
        return PetitionResource::collection(
            $this->model::with([
                'address',
                'mediafile',
                'hashTag',
                'incidentCategory'
            ])->where('user_id','=', $user_id)->get()
        );
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
    }

//    public function update(PetitionRequest $request, Petition $petition)
//    {
//        $this->model->fill($request->all());
//
//        if ($this->model->save()) {
//            return $this->model;
//        }
//        else {
//            throw new \DomainException('Update error');
//        }
//    }

//    public function destroy(Petition $petition): bool
//    {
//        if ($petition->delete()) {
//            return true;
//        }
//
//        throw new \DomainException('Error deleting petition');
//    }
}
