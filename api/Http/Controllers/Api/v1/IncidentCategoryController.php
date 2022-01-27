<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Repositories\IncidentCategory\IncidentCategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncidentCategoryController extends Controller
{
    protected $incidentCategoryRepository;

    public function __construct(IncidentCategoryRepository $incidentCategory)
    {
        $this->incidentCategoryRepository = $incidentCategory;
    }

    public function show(): JsonResponse
    {
        $categories = $this->incidentCategoryRepository->getAll();

        if (empty($categories)) {
            return response()->json('User not found', 404);
        }

        return response()->json(['success' => true,
            'data' => $categories
        ]);
    }
}
