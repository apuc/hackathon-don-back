<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Http\Resources\v1\IncidentCategoryResource;
use Api\Services\Petition\IncidentCategoryService;
use App\Repositories\IncidentCategory\IncidentCategoryRepository;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class IncidentCategoryController extends Controller
{
    protected $incidentCategoryRepository;
    protected $incidentCategoryService;

    public function __construct(IncidentCategoryRepository $incidentCategory, IncidentCategoryService $incidentCategoryService)
    {
        $this->incidentCategoryRepository = $incidentCategory;
        $this->incidentCategoryService = $incidentCategoryService;
    }

    public function show($category_id = null): JsonResponse
    {
        $categories = $this->incidentCategoryService->show($category_id);

        if (empty($categories)) {
            return response()->json('Category not found', 404);
        }

        if($category_id != null) {
            return response()->json(['success' => true,
                IncidentCategoryResource::make($categories)
            ]);
        }

        return response()->json(['success' => true,
            IncidentCategoryResource::collection($categories)
        ]);
    }
}
