<?php

namespace Api\Repositories\Petition;

use Api\Http\Requests\v1\PetitionMediaFileRequest;
use App\Models\PetitionMediaFile;

class PetitionMediaFileRepository
{
    protected $model;

    public function __construct(PetitionMediaFile $petitionMediaFile)
    {
        $this->model = $petitionMediaFile;
    }

    public function create(PetitionMediaFileRequest $request)
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
