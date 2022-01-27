<?php

namespace Api\Http\Controllers\Api\v1;


use Api\Http\Requests\v1\PetitionRequest;
use Api\Repositories\Petition\PetitionRepository;
use Api\Services\Petition\PetitionService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PetitionController extends Controller
{
    protected $petitionRepository;
    protected $petitionService;

    public function __construct(PetitionRepository $petitionRepository, PetitionService $service)
    {
        $this->petitionRepository = $petitionRepository;
        $this->petitionService = $service;
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
        $petitions = $this->petitionRepository->findByUserId($user_id);

        if (empty($petitions)) { // TODO не работает проверка
            return response()->json('Petition not found', 404);
        }

        return response()->json(['success' => true,
            'data' => $petitions
        ]);
    }

    public function  store(PetitionRequest $petitionRequest)
    {

//        return response()->json(['success' => true,
//            'data' => $request->post()
//        ]);
//        print_r('fff'); die();
//        $cat = $request->post('incident_category');
//        var_dump($request->post()); die;
//
        //print_r($petitionRequest->file('mediafiles'));die();

//        $files = $petitionRequest->post('mediafiles');
//        //$photo = $files[0];
//        return response()->json(['success' => true,
//            'data' => $files
//        ]);
//        var_dump( $files);die();

//        print_r($petitionRequest->post());die();

//        return response()->json(['success' => true,
//            'data' => $petitionRequest->post()['address']
//        ]);

        try {
            $petition = $this->petitionService->create($petitionRequest);

            return $petition;//new PetitionRepository($petition);
        } catch (\Throwable $e)
        {
            abort(500);
        }
    }

}
