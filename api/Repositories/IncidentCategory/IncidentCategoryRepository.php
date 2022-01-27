<?php

namespace Api\Repositories\IncidentCategory;


use Api\Http\Resources\v1\IncidentCategoryResource;
use App\Models\IncidentCategory;

class IncidentCategoryRepository
{
    protected $model;

    public function __construct(IncidentCategory $incidentCategory)
    {
        $this->model = $incidentCategory;
    }

    public function findById(int $category_id)
    {
        return IncidentCategoryResource::make(
            $this->model::find($category_id));
    }

    public function getAll()
    {
        return IncidentCategoryResource::collection(
            $this->model::all());
    }
}
