<?php

namespace App\Http\Resources\User\Partial;

use Illuminate\Http\Resources\Json\JsonResource;

class CityByStatusResource extends JsonResource
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
            'city_vip' => $this->city_vip,
            'photo' => $this->photo,
            'slug' => $this->slug,
            'userbycities_count' => $this->userbycities_count,
        ];
    }
}
