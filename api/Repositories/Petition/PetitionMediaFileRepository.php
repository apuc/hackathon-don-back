<?php

namespace Api\Repositories\Petition;

use Api\Http\Requests\v1\PetitionMediaFileRequest;
use App\Models\PetitionMediaFile;

class PetitionMediaFileRepository
{
    public function create(PetitionMediaFileRequest $request)
    {
        $model = new PetitionMediaFile();
        $model->fill($request->all());

        if ($model->save()) {
            return $model;
        }
        else {
            throw new \DomainException('Saving error');
        }
    }
}
