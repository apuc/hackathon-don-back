<?php

namespace Api\Services\Petition;

use Api\Http\Requests\v1\AddressRequest;
use Api\Http\Requests\v1\PetitionRequest;
use Api\Repositories\Petition\AddressRepository;
use Api\Repositories\Petition\PetitionRepository;
use App\Models\Petition;
use Illuminate\Support\Facades\DB;

class PetitionService
{
    protected $petitionRepository;
    protected $addressRepository;
//    protected $petitionHasTagRepository;
//    protected $petitionMediaFileRepository;

    public function __construct(AddressRepository $addressRepository, PetitionRepository $petitionRepository)
    {
        $this->addressRepository = $addressRepository;
        $this->petitionRepository = $petitionRepository;

//        $this->petitionHasTagRepository =
//        $this->petitionMediaFileRepository =
    }

    public function create(PetitionRequest $request)
    {
        return DB::transaction(function () use ($request){

            $address = $this->storeAddress($request['address']);

            $petition = $this->storePetition($request, $address->id);



            $this->storeHashTags($request['hashtag']);


            return $petition;
        });
    }

    private function storeAddress($data)
    {
        $addressRequest = new AddressRequest();
        $addressRequest->merge($data);

        return $this->addressRepository->create($addressRequest);
    }

    private function storePetition($request, $address_id): Petition
    {
        $request['address_id'] = $address_id;
        return $this->petitionRepository->create($request);
    }

    private function storeHashTags($hashtagArr)
    {
        foreach ($hashtagArr as $hashtag) {

        }

    }

    public function show($petition_id)
    {
        // return DB::transaction();
    }

}
