<?php

namespace Api\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class RolesResource extends JsonResource
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
            'id' => $this->user_id,
            'title' => $this->title,
            'mnemonic_name' => $this->description,
            'status' => $this->views,
            'created_at' => $this->created_at,
        ];
    }
}
