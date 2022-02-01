<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Http\Requests\v1\PetitionRequest;
use Api\Http\Resources\v1\PetitionResource;
use Api\Services\Petition\PetitionService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Throwable;

class PetitionController extends Controller
{
    protected $petitionService;

    public function __construct(PetitionService $service)
    {
        $this->petitionService = $service;
    }

    public function show($petition_id): JsonResponse
    {
        $petition = $this->petitionService->show($petition_id);

        if (empty($petition)) {
            return response()->json('Petition not found', 404);
        }

        return response()->json(['success' => true,
            'data' => new PetitionResource($petition)
        ]);
    }

    public function showByUser($user_id): JsonResponse
    {
        $petitions = $this->petitionService->showByUser($user_id);

        if (empty($petitions)) {
            return response()->json('Petitions not found', 404);
        }

        return response()->json(['success' => true,
            'data' => PetitionResource::collection($petitions)
        ]);
    }

    public function store(PetitionRequest $petitionRequest): JsonResponse
    {
        try {
            $petition = $this->petitionService->create($petitionRequest);

            return response()->json(['success' => true,
                'data' => new PetitionResource($petition)
            ]);
        } catch (Throwable $e)
        {
            return response()->json('Saving error', 500);
        }
    }
}
