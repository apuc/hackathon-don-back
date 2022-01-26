<?php

namespace App\Services\Petition;


use App\Http\Requests\PetitionRequest;
use App\Models\Petition;
use App\Repositories\Petition\PetitionRepository;
use Illuminate\Support\Facades\DB;

class PetitionService
{
    protected $repository;

    public function __construct(PetitionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(PetitionRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $petition = $this->repository->create($request);

            //$channel->users()->sync($request->get('user_ids'));

            return $petition;
        });
    }

    public function update(PetitionRequest $request, Petition $petition)
    {
        return $this->repository->update($request, $petition);
    }

    public function destroy(Petition $petition)
    {
        return $this->repository->destroy($petition);
    }
}
