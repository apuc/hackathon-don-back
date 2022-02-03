<?php

namespace App\Repositories\IncidentCategory;

use App\Models\IncidentCategory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class IncidentCategoryRepository
{
    protected $model;

    public function __construct(IncidentCategory $incidentCategory)
    {
        $this->model = $incidentCategory;
    }

    public function findById(int $category_id): ?IncidentCategory
    {
        return $this->model::find($category_id);
    }

    public function findAllPaginated(): LengthAwarePaginator
    {
        return IncidentCategory::query()->paginate();
    }

    public function getAll()
    {
        return $this->model::all();
    }
}
