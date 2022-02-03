<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Http\Resources\v1\Collections\IncidentCategoryCollection;
use Api\Http\Resources\v1\IncidentCategoryResource;
use Api\Services\Petition\IncidentCategoryService;
use App\Http\Controllers\Controller;
use App\Repositories\IncidentCategory\IncidentCategoryRepository;
use Illuminate\Http\JsonResponse;

class IncidentCategoryController extends Controller
{
    protected IncidentCategoryService $incidentCategoryService;
    protected IncidentCategoryRepository $incidentCategoryRepository;

    public function __construct(
        IncidentCategoryService    $incidentCategoryService,
        IncidentCategoryRepository $incidentCategoryRepository
    )
    {
        $this->incidentCategoryService = $incidentCategoryService;
        $this->incidentCategoryRepository = $incidentCategoryRepository;
    }

    public function index(): JsonResponse
    {
        $categories = $this->incidentCategoryRepository->findAllPaginated();

        return response()->json([
            'success' => true,
            'data'    => new IncidentCategoryCollection($categories),
        ]);
    }

    public function show($category_id = null): JsonResponse
    {
        $category = $this->incidentCategoryRepository->findById($category_id);

        if (empty($category)) {
            return response()->json('Category not found', 404);
        }

        return response()->json([
            'success' => true,
            'data'    => new IncidentCategoryResource($category)
        ]);
    }
}
