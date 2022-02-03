<?php

namespace Api\Services\Petition;

use App\Repositories\IncidentCategory\IncidentCategoryRepository;

class IncidentCategoryService
{
    protected $incidentCategoryRepository;

    /**
     * @param IncidentCategoryRepository $incidentCategoryRepository
     */
    public function __construct(IncidentCategoryRepository $incidentCategoryRepository)
    {
        $this->incidentCategoryRepository = $incidentCategoryRepository;
    }

    /**
     * @param null $category_id
     * @return \App\Models\IncidentCategory[]|\Illuminate\Database\Eloquent\Collection
     */
    public function show($category_id = null)
    {
        if(!empty($category_id)) {
            return $this->incidentCategoryRepository->findById($category_id);
        }
        return $this->incidentCategoryRepository->getAll();
    }
}
