<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->status,
            'password' => $this->description,
            'emil' => $this->rating,
            'phone' => $this->views,
            'status' => $this->views,
            'confirm_sms_code' => $this->views,
            'confirm_email_code' => $this->views,
            'remember_token' => $this->views,
            'created_at' => $this->created_at,
            'user-profile' => UserProfileResource::make($this->userProfile)
        ];
    }
}
