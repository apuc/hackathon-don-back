<?php

namespace Api\Services\Petition;

use Api\Http\Requests\v1\AddressRequest;
use Api\Http\Requests\v1\IncidentCategoryPetitionRequest;
use Api\Http\Requests\v1\MediaFileRequest;
use Api\Http\Requests\v1\PetitionAnonymouslyRequest;
use Api\Http\Requests\v1\PetitionHashTagRequest;
use Api\Http\Requests\v1\PetitionMediaFileRequest;
use Api\Http\Requests\v1\PetitionRequest;
use App\Models\Address;
use App\Repositories\AddressRepository;
use App\Repositories\Petition\IncidentCategoryPetitionRepository;
use App\Repositories\Petition\MediaFileRepository;
use App\Repositories\Petition\PetitionHashTagRepository;
use App\Repositories\Petition\PetitionMediaFileRepository;
use App\Repositories\Petition\PetitionRepository;
use App\Models\Petition;
use Illuminate\Support\Facades\DB;

class PetitionService
{
    protected $petitionRepository;
    protected $addressRepository;
    protected $petitionHasTagRepository;
    protected $categoryPetitionRepository;
    protected $petitionMediaFileRepository;
    protected $mediaFileRepository;

    public function __construct(
        AddressRepository                  $addressRepository,
        PetitionRepository                 $petitionRepository,
        PetitionHashTagRepository          $petitionHasTagRepository,
        IncidentCategoryPetitionRepository $categoryPetitionRepository,
        PetitionMediaFileRepository        $petitionMediaFileRepository,
        MediaFileRepository                $mediaFileRepository
    ){
        $this->addressRepository = $addressRepository;
        $this->petitionRepository = $petitionRepository;
        $this->petitionHasTagRepository = $petitionHasTagRepository;
        $this->categoryPetitionRepository = $categoryPetitionRepository;
        $this->petitionMediaFileRepository = $petitionMediaFileRepository;
        $this->mediaFileRepository = $mediaFileRepository;
    }

    public function create($request)
    {
        return DB::transaction(function () use ($request){

            $address = $this->storeAddress($request);
            $petition = $this->storePetition($request, $address);
            $this->storeHashTags($request, $petition->id);
            $this->storeIncidentCategory($request, $petition->id);
            $this->storePhoto($request, $petition->id);
            $this->storeVideo($request, $petition->id);

            return $petition;
        });
    }

    private function storeVideo($request, $petition_id)
    {
        if (!empty($request['video'])) {
            $video = $this->storeMediaFile($request['video']);
            $this->storeMediaFileForPetition($petition_id, $video->id);
        }
    }

    private function storePhoto($request, $petition_id)
    {
        if (!empty($request['photo'])) {
            $path = $request->file('photo')->store('uploads', 'public');

            $photo = $this->storeMediaFile($path);
            $this->storeMediaFileForPetition($petition_id, $photo->id);
        }
    }

    protected function storeMediaFile($path)
    {
        $mediaFileRequest = new MediaFileRequest();
        $mediaFileRequest->merge(['path' => $path]);

        return $this->mediaFileRepository->create($mediaFileRequest);
    }

    protected  function storeMediaFileForPetition($petition_id, $mediafile_id)
    {
        $petitionMediaFileRequest = new PetitionMediaFileRequest();
        $petitionMediaFileRequest->merge(['petition_id' => $petition_id, 'mediafile_id' => $mediafile_id]);

        $this->petitionMediaFileRepository->create($petitionMediaFileRequest);
    }

    private function storeIncidentCategory($request, $petition_id)
    {
        if (!empty($request['incident_category'])) {
            foreach ($request['incident_category'] as $data) {
                $data['petition_id'] = $petition_id;

                $petitionCategory = new IncidentCategoryPetitionRequest();
                $petitionCategory->merge($data);
                $this->categoryPetitionRepository->create($petitionCategory);
            }
        }
    }

    private function storeHashTags($request, $petition_id)
    {
        if (!empty($request['hashtag'])) {
            foreach ($request['hashtag'] as $data) {
                $data['petition_id'] = $petition_id;

                $petitionHashTags = new PetitionHashTagRequest();
                $petitionHashTags->merge($data);
                $this->petitionHasTagRepository->create($petitionHashTags);
            }
        }
    }

    private function storeAddress($request): ?Address
    {
        if (!empty($request['address'])) {
            $addressRequest = new AddressRequest();
            $addressRequest->merge($request['address']);

            return $this->addressRepository->create($addressRequest);
        }
        return null;
    }

    private function storePetition($request, $address): Petition
    {
        if (!empty($address)) {
            $request['address_id'] = $address->id;
        }
        return $this->petitionRepository->create($request);
    }
}
