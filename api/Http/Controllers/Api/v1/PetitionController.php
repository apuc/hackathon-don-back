<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Repositories\Petition\PetitionRepository;
use App\Services\Petition\PetitionService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class PetitionController extends Controller
{
    protected $petitionRepository;
    protected $petitionService;

    public function __construct(PetitionRepository $petitionRepository, PetitionService $service)
    {
        $this->petitionRepository = $petitionRepository;
        $this->petitionService = $service;
    }

    public function getPetition(Request $request): JsonResponse
    {
        $sosi = 'sosi2222222pos111';

        return response()->json(['success' => true,
            'data' => $sosi
        ]);



//        $project = Project::where('token', $request->bearerToken())->first();
//
//        $affiliate = $project->affiliates()->where('user_uid', $request->get('user_uid'))->first();
//        if (empty($affiliate)) {
//            if (Config('app.production')) {
//                return response()->json('Internal server error', 500);
//            } else {
//                return response()->json('Incorrect user_uid', 500);
//            }
//        }
//        $affiliateResource = new AffiliateResource($affiliate);
//        return response()->json([
//            'data' => $affiliateResource
//        ]);
    }

    public function show($petition_id): JsonResponse
    {
        $petition = $this->petitionRepository->findById($petition_id);

        if (empty($petition)) {
            return response()->json('Petition not found', 404);
        }

        return response()->json(['success' => true,
            'data' => $petition
        ]);
    }
    public function showByUser($user_id): JsonResponse
    {
        $petition = $this->petitionRepository->findById($user_id);

        if (empty($petition)) {
            return response()->json('Petition not found', 404);
        }

        return response()->json(['success' => true,
            'data' => $petition
        ]);
    }
}
