<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Http\Resources\v1\IncidentCategoryResource;
use Api\Services\Petition\IncidentCategoryService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class IncidentCategoryController extends Controller
{
    protected $incidentCategoryService;

    /**
     * @param IncidentCategoryService $incidentCategoryService
     */
    public function __construct(IncidentCategoryService $incidentCategoryService)
    {
        $this->incidentCategoryService = $incidentCategoryService;
    }

    /**
     * @param null $category_id
     * @return JsonResponse
     */
    public function show($category_id = null): JsonResponse
    {
        $categories = $this->incidentCategoryService->show($category_id);

        if (empty($categories)) {
            return response()->json('Category not found', 404);
        }

        if($category_id != null) {
            return response()->json(['success' => true,
                'data' => new IncidentCategoryResource($categories)
            ]);
        }

        return response()->json(['success' => true,
            'data' => IncidentCategoryResource::collection($categories)
        ]);
    }
}
