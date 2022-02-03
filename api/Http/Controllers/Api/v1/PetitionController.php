<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Http\Requests\v1\PetitionAnonymouslyRequest;
use Api\Http\Requests\v1\PetitionByPhoneRequest;
use Api\Http\Requests\v1\PetitionRequest;
use Api\Http\Resources\v1\Collections\PetitionResourceCollection;
use Api\Http\Resources\v1\PetitionResource;
use Api\Services\Petition\PetitionService;
use App\Http\Controllers\Controller;
use App\Repositories\Petition\PetitionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Throwable;

class PetitionController extends Controller
{
    protected PetitionService $petitionService;
    protected PetitionRepository $petitionRepository;

    public function __construct(PetitionService $service, PetitionRepository $petitionRepository)
    {
        $this->petitionService = $service;
        $this->petitionRepository = $petitionRepository;
    }

    public function showByPhone(PetitionByPhoneRequest $request): JsonResponse
    {
        $petitions = $this->petitionRepository->findByPhonePaginated($request['phone']);

        return response()->json([
            'success' => true,
            'data'    => new PetitionResourceCollection($petitions),
        ]);
    }

    public function show($petition_id): JsonResponse
    {
        $petition = $this->petitionRepository->findById($petition_id);

        if (empty($petition)) {
            return response()->json('Petition not found', 404);
        }

        return response()->json([
            'success' => true,
            'data'    => new PetitionResource($petition)
        ]);
    }

    public function showByUser($user_id): JsonResponse
    {
        $petitions = $this->petitionRepository->findByUserId($user_id);

        if (empty($petitions)) {
            return response()->json('Petitions not found', 404);
        }

        return response()->json([
            'success' => true,
            'data'    => PetitionResource::collection($petitions)
        ]);
    }

    public function store(PetitionRequest $petitionRequest): JsonResponse
    {
        try {
            $petitionRequest['user_id'] = Auth::user()->id;
            $petition = $this->petitionService->create($petitionRequest);

            return response()->json([
                'success' => true,
                'data'    => new PetitionResource($petition)
            ]);
        } catch (Throwable $e) {
            return response()->json('Saving error', 500);
        }
    }

    public function storeAnonymously(PetitionAnonymouslyRequest $petitionRequest): JsonResponse
    {
        try {
            $petition = $this->petitionService->create($petitionRequest);

            return response()->json([
                'success' => true,
                'data'    => new PetitionResource($petition)
            ]);
        } catch (Throwable $e) {
            return response()->json('Saving error', 500);
        }
    }
}
