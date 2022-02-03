<?php

namespace Api\Http\Resources\v1\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;

class IncidentCategoryCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'incidents' => $this->collection->transform(function ($item) {
                return [
                    'id'            => $item->id,
                    'title'         => $item->title,
                    'mnemonic_name' => $item->mnemonic_name,
                    'icon'          => $item->icon,
                    'rating'        => $item->rating,
                    'status'        => $item->status,
                    'created_at'    => $item->created_at,
                ];
            }),
            'last_page' => $this->resource->lastPage(),
            'per_page'  => $this->resource->perPage(),
            'total'     => $this->resource->total()
        ];
    }
}
