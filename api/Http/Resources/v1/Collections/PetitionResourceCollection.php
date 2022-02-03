<?php

namespace Api\Http\Resources\v1\Collections;

use Api\Http\Resources\v1\AddressResource;
use Api\Http\Resources\v1\HashTagResource;
use Api\Http\Resources\v1\IncidentCategoryResource;
use Api\Http\Resources\v1\MediaFileResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PetitionResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'petitions' => $this->collection->transform(function ($item) {
                return [
                    'user_id' => $item->user_id,
                    'status' => $item->status,
                    'description' => $item->description,
                    'rating' => $item->rating,
                    'views' => $item->views,
                    'created_at' => $item->created_at,
                    'incident_category' => IncidentCategoryResource::collection($item->incidentCategory),
                    'address' => AddressResource::make($item->address),
                    'mediafile' => MediaFileResource::collection($item->mediafile),
                    'hash_tag' => HashTagResource::collection($item->hashTag),
                ];
            }),
            'last_page' => $this->resource->lastPage(),
            'per_page'  => $this->resource->perPage(),
            'total'     => $this->resource->total()
        ];
    }
}
