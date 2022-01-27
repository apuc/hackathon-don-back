<?php

namespace Api\Repositories\Petition;


use Api\Http\Requests\v1\PetitionRequest;
use Api\Http\Resources\v1\PetitionResource;
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
        return PetitionResource::make(
            $this->model::with([
                'address',
                'mediafile',
                'hashTag',
                'incidentCategory'
            ])->find($id));
    }

    public function findByUserId(int $user_id) //:?Channel
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
}
