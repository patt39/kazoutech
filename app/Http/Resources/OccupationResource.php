<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OccupationResource extends JsonResource
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
            'name' => $this->name,
            'status' => $this->status,
            'slug' => $this->slug,
            'photo' => $this->photo,
            'description' => $this->description,
            'user' => $this->user,
            'statusOnline' => $this->user->isOnline(),
            'technician_count' => $this->technicians()->get()->count(),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
