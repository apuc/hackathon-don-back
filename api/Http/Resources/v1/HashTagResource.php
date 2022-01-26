<?php

namespace Api\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class HashTagResource extends JsonResource
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
            'created_at' => $this->created_at,
        ];
    }
}
