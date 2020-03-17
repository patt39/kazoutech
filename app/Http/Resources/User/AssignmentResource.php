<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->user,
            'city' => $this->city,
            'periode' => $this->periode,
            'city_id' => $this->city_id,
            'slug' => $this->slug,
            'title' => $this->title,
            'status' => $this->status,
            'description' => $this->description,
            'user_id' => $this->user_id,
            'occupation' => $this->occupation,
            'occupation_id' => $this->occupation_id,
            'member' => $this->member,
            'member_id' => $this->member_id,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
