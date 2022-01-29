<?php

namespace Api\Http\Resources\v1;

use Api\Http\Resources\v1\AddressResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
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
            'fio' => $this->fio,
            'photo' => $this->photo,
            'rating' => $this->rating,
            'level' => $this->level,
            'address' => AddressResource::make($this->address),
        ];
    }
}
