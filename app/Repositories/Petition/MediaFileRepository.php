<?php

namespace App\Repositories\Petition;

use Api\Http\Requests\v1\MediaFileRequest;
use App\Models\MediaFile;

class MediaFileRepository
{
    protected MediaFile $model;

    public function __construct(MediaFile $model)
    {
        $this->model = $model;
    }

    public function create(MediaFileRequest $request): ?MediaFile
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
