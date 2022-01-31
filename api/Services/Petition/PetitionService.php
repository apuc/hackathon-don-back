<?php

namespace Api\Services\Petition;

use Api\Http\Requests\v1\AddressRequest;
use Api\Http\Requests\v1\IncidentCategoryPetitionRequest;
use Api\Http\Requests\v1\MediaFileRequest;
use Api\Http\Requests\v1\PetitionHashTagRequest;
use Api\Http\Requests\v1\PetitionMediaFileRequest;
use Api\Http\Requests\v1\PetitionRequest;
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

    public function __construct(AddressRepository $addressRepository, PetitionRepository $petitionRepository,
    PetitionHashTagRepository $petitionHasTagRepository, IncidentCategoryPetitionRepository $categoryPetitionRepository,
    PetitionMediaFileRepository $petitionMediaFileRepository, MediaFileRepository $mediaFileRepository)
    {
        $this->addressRepository = $addressRepository;
        $this->petitionRepository = $petitionRepository;
        $this->petitionHasTagRepository = $petitionHasTagRepository;
        $this->categoryPetitionRepository = $categoryPetitionRepository;
        $this->petitionMediaFileRepository = $petitionMediaFileRepository;
        $this->mediaFileRepository = $mediaFileRepository;
    }

    public function create(PetitionRequest $request)
    {

        return DB::transaction(function () use ($request){

            $address = $this->storeAddress($request['address']);

            $petition = $this->storePetition($request, $address->id);

            if (!empty($request['hashtag'])) {
                $petitionHashtags = $this->storeHashTags($request['hashtag'], $petition->id);
            }

            if (!empty($request['incident_category'])) {
                $petitionCategoryArr = $this->storeIncidentCategory($request['incident_category'], $petition->id);
            }

            if (!empty($request['photo'])) {
                $petitionPhoto = $this->storePhoto($request, $petition->id);
            }


            if (!empty($request['video'])) {
                $petitionVideo = $this->storeVideo($request['video'], $petition->id);
            }
            return $petition;
        });
    }

    private function storeVideo($path, $petition_id)
    {
        $mediaFileRequest = new MediaFileRequest();
        $mediaFileRequest->merge(['path' => $path]);
        $video = $this->mediaFileRepository->create($mediaFileRequest);

        $petitionMediaFileRequest = new PetitionMediaFileRequest();
        $petitionMediaFileRequest->merge(['petition_id' => $petition_id, 'mediafile_id' => $video->id]);
        return $this->petitionMediaFileRepository->create($petitionMediaFileRequest);
    }

    private function storePhoto($request, $petition_id)
    {
        $path = $request->file('photo')->store('uploads', 'public');

        $mediaFileRequest = new MediaFileRequest();
        $mediaFileRequest->merge(['path' => $path]);
        $photo = $this->mediaFileRepository->create($mediaFileRequest);

        $petitionMediaFileRequest = new PetitionMediaFileRequest();
        $petitionMediaFileRequest->merge(['petition_id' => $petition_id, 'mediafile_id' => $photo->id]);
        return $this->petitionMediaFileRepository->create($petitionMediaFileRequest);
    }

    private function storeIncidentCategory($incidentCategoriesArr, $petition_id)
    {
        $petitionCategoryArr = array();
        foreach ($incidentCategoriesArr as $incidentCategory) {
            $data = $incidentCategory;
            $data['petition_id'] = $petition_id;

            $petitionCategory = new IncidentCategoryPetitionRequest();
            $petitionCategory->merge($data);

            $petitionCategoryArr[] = $this->categoryPetitionRepository->create($petitionCategory);
        }
        return $petitionCategoryArr;
    }

    private function storeHashTags($hashtags, $petition_id)
    {
        $PetitionHashtag = array();
        foreach ($hashtags as $hashtag) {
            $data = $hashtag;
            $data['petition_id'] = $petition_id;

            $petitionHashTags = new PetitionHashTagRequest();
            $petitionHashTags->merge($data);

            $PetitionHashtag[] = $this->petitionHasTagRepository->create($petitionHashTags);
        }
        return $PetitionHashtag;
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
}
