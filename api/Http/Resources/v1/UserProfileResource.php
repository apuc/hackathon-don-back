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
            'id' => $this->id,
            'fio' => $this->fio,
            'photo' => $this->photo,
            'created_at' => $this->created_at,
            'rating' => $this->rating,
            'level' => $this->level,
            'email_verified_at' => $this->email_verified_at,
            'phone_verified_at' => $this->phone_verified_at,
            'address' => AddressResource::make($this->address),
        ];
    }
}
