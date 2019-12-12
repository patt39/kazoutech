<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class OccupationByStatusResource extends JsonResource
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
            'slug' => $this->slug,
            'photo' => $this->photo,
            'categoryoccupations' => $this->categoryoccupations()->select('id','slug','photo','name')->get()->toArray(),
            'status' => $this->status,
            'description' => $this->description,
        ];
    }
}
