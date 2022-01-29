<?php

namespace Api\Repositories\Petition;

use Api\Http\Requests\v1\MediaFileRequest;
use App\Models\MediaFile;

class MediaFileRepository
{
    public function create(MediaFileRequest $request)
    {
        $model = new MediaFile();
        $model->fill($request->all());

        if ($model->save()) {
            return $model;
        }
        else {
            throw new \DomainException('Saving error');
        }
    }
}
