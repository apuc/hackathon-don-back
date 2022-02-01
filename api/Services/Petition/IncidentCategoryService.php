<?php

namespace Api\Services\Petition;

use App\Repositories\IncidentCategory\IncidentCategoryRepository;

class IncidentCategoryService
{
    protected $incidentCategoryRepository;

    public function __construct(IncidentCategoryRepository $incidentCategoryRepository)
    {
        $this->incidentCategoryRepository = $incidentCategoryRepository;
    }

    public function show($category_id = null)
    {
        if(!empty($category_id)) {
            return $this->incidentCategoryRepository->findById($category_id);
        }
        return $this->incidentCategoryRepository->getAll();
    }
}
