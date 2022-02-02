<?php

namespace Api\Services\Petition;

use Api\Http\Requests\v1\AddressRequest;
use Api\Http\Requests\v1\IncidentCategoryPetitionRequest;
use Api\Http\Requests\v1\MediaFileRequest;
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

    /**
     * @param AddressRepository $addressRepository
     * @param PetitionRepository $petitionRepository
     * @param PetitionHashTagRepository $petitionHasTagRepository
     * @param IncidentCategoryPetitionRepository $categoryPetitionRepository
     * @param PetitionMediaFileRepository $petitionMediaFileRepository
     * @param MediaFileRepository $mediaFileRepository
     */
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

    /**
     * @param $petition_id
     * @return mixed
     */
    public function show($petition_id)
    {
        return $this->petitionRepository->findById($petition_id);
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function showByUser($user_id)
    {
        return $this->petitionRepository->findByUserId($user_id);
    }

    /**
     * @param PetitionRequest $request
     * @return mixed
     */
    public function create(PetitionRequest $request)
    {
        return DB::transaction(function () use ($request){

            $address = $this->storeAddress($request['address']);
            $petition = $this->storePetition($request, $address->id);
            $this->storeHashTags($request, $petition->id);
            $this->storeIncidentCategory($request, $petition->id);
            $this->storePhoto($request, $petition->id);
            $this->storeVideo($request, $petition->id);

            return $petition;
        });
    }

    /**
     * @param $request
     * @param $petition_id
     */
    private function storeVideo($request, $petition_id)
    {
        if (!empty($request['video'])) {
            $video = $this->storeMediaFile($request['video']);
            $this->storeMediaFileForPetition($petition_id, $video->id);
        }
    }

    /**
     * @param $request
     * @param $petition_id
     */
    private function storePhoto($request, $petition_id)
    {
        if (!empty($request['photo'])) {
            $path = $request->file('photo')->store('uploads', 'public');

            $photo = $this->storeMediaFile($path);
            $this->storeMediaFileForPetition($petition_id, $photo->id);
        }
    }

    /**
     * @param $path
     * @return \App\Models\MediaFile
     */
    protected function storeMediaFile($path)
    {
        $mediaFileRequest = new MediaFileRequest();
        $mediaFileRequest->merge(['path' => $path]);

        return $this->mediaFileRepository->create($mediaFileRequest);
    }

    /**
     * @param $petition_id
     * @param $mediafile_id
     */
    protected  function storeMediaFileForPetition($petition_id, $mediafile_id)
    {
        $petitionMediaFileRequest = new PetitionMediaFileRequest();
        $petitionMediaFileRequest->merge(['petition_id' => $petition_id, 'mediafile_id' => $mediafile_id]);

        $this->petitionMediaFileRepository->create($petitionMediaFileRequest);
    }

    /**
     * @param $request
     * @param $petition_id
     */
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

    /**
     * @param $request
     * @param $petition_id
     */
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

    /**
     * @param $data
     * @return Address
     */
    private function storeAddress($data): Address
    {
        $addressRequest = new AddressRequest();
        $addressRequest->merge($data);

        return $this->addressRepository->create($addressRequest);
    }

    /**
     * @param $request
     * @param $address_id
     * @return Petition
     */
    private function storePetition($request, $address_id): Petition
    {
        $request['address_id'] = $address_id;
        return $this->petitionRepository->create($request);
    }
}
