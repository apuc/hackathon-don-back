<?php

namespace Api\Http\Resources\v1;

use Api\Http\Resources\v1\MediaFileResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Api\Http\Resources\v1\AddressResource;

class PetitionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id,
            'status' => $this->status,
            'description' => $this->description,
            'rating' => $this->rating,
            'views' => $this->views,
            'created_at' => $this->created_at,
            'incident_category' => IncidentCategoryResource::collection($this->incidentCategory),
            'address' => AddressResource::make($this->address),
            'mediafile' => MediaFileResource::collection($this->mediafile),
            'hash_tag' => HashTagResource::collection($this->hashTag),
        ];
    }
}
