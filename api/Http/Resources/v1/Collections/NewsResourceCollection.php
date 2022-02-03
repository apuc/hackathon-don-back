<?php

namespace Api\Http\Resources\v1\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NewsResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'news' => $this->collection->transform(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'news_category_id' => $item->news_category_id,
                    'user_id' => $item->user_id,
                    'status' => $item->status,
                    'rating' => $item->rating,
                    'views' => $item->views,
                    'media' => $item->media,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at
                ];
            }),
            'last_page' => $this->resource->lastPage(),
            'per_page'  => $this->resource->perPage(),
            'total'     => $this->resource->total()
        ];
    }
}
