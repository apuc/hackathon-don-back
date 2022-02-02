<?php

namespace App\Repositories\IncidentCategory;

use App\Models\IncidentCategory;

class IncidentCategoryRepository
{
    /**
     * @var IncidentCategory
     */
    protected $model;

    /**
     * @param IncidentCategory $incidentCategory
     */
    public function __construct(IncidentCategory $incidentCategory)
    {
        $this->model = $incidentCategory;
    }

    /**
     * @param int $category_id
     * @return mixed
     */
    public function findById(int $category_id)
    {
        return $this->model::find($category_id);
    }

    /**
     * @return IncidentCategory[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model::all();
    }
}
