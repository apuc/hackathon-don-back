<?php

namespace Api\Repositories\Petition;

use Api\Http\Requests\v1\MediaFileRequest;
use App\Models\MediaFile;

class MediaFileRepository
{
    protected $model;

    public function __construct(MediaFile $mediaFile)
    {
        $this->model = $mediaFile;
    }

    public function create(MediaFileRequest $request)
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
