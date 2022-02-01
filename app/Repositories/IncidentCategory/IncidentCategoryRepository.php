<?php

namespace App\Repositories\IncidentCategory;

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
        return $this->model::find($category_id);
    }

    public function getAll()
    {
        return $this->model::all();
    }
}
