<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class TechnicianResource extends JsonResource
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
            'user_id' => $this->user_id,
            'city_id' => $this->city_id,
            'occupation_id' => $this->occupation_id,
            'city' => $this->city,
            'occupation' => $this->occupation,
            'diploma' => $this->diploma,
            'district' => $this->district,
            'technician' => $this->technician,
            'speciality' => $this->speciality,
            'year' => $this->year,
            'slug' => $this->slug,
            'user' => $this->user,
            'member' => $this->member,
            'diploma_id' => $this->diploma_id,
            'statusOnline' => $this->user->isOnline(),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
