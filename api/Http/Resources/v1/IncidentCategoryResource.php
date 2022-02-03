<?php

namespace Api\Http\Resources\v1;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class IncidentCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'mnemonic_name' => $this->mnemonic_name,
            'icon' => $this->icon,
            'rating' => $this->rating,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
