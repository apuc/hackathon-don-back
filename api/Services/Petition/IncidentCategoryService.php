<?php

namespace Api\Services\Petition;

use App\Models\IncidentCategory;
use App\Repositories\IncidentCategory\IncidentCategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class IncidentCategoryService
{
    protected IncidentCategoryRepository $incidentCategoryRepository;

    /**
     * @param IncidentCategoryRepository $incidentCategoryRepository
     */
    public function __construct(IncidentCategoryRepository $incidentCategoryRepository)
    {
        $this->incidentCategoryRepository = $incidentCategoryRepository;
    }

    /**
     * @param null $category_id
     * @return IncidentCategory|IncidentCategory[]|Collection
     */
    public function show($category_id = null)
    {
        if(!empty($category_id)) {
            return $this->incidentCategoryRepository->findById($category_id);
        }
        return $this->incidentCategoryRepository->getAll();
    }
}
