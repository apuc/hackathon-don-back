<?php

namespace Api\Http\Controllers\Api\v1;

use App\Repositories\IncidentCategory\IncidentCategoryRepository;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class IncidentCategoryController extends Controller
{
    protected $incidentCategoryRepository;

    public function __construct(IncidentCategoryRepository $incidentCategory)
    {
        $this->incidentCategoryRepository = $incidentCategory;
    }

    public function show($category_id = null): JsonResponse
    {
        if(!empty($category_id)) {
            $categories = $this->incidentCategoryRepository->findById($category_id);
        }
        else {
            $categories = $this->incidentCategoryRepository->getAll();
        }

        if (empty($categories)) {
            return response()->json('User not found', 404);
        }

        return response()->json(['success' => true,
            'data' => $categories
        ]);
    }
}
