<?php

namespace Api\Http\Resources\v1;

use Api\Http\Resources\v1\AddressResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class UserProfileResource extends JsonResource
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
            'fio' => $this->fio,
            'photo' => $this->photo,
            'rating' => $this->rating,
            'level' => $this->level,
            'address' => AddressResource::make($this->address),
        ];
    }
}
