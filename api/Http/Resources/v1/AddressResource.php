<?php

namespace Api\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'explanation' => $this->explanation,
            'created_at' => $this->created_at
        ];
    }
}
