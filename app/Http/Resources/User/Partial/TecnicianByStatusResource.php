<?php

namespace App\Http\Resources\User\Partial;

use Illuminate\Http\Resources\Json\JsonResource;

class TecnicianByStatusResource extends JsonResource
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
            'diploma_id' => $this->diploma_id,
            'city' => $this->city()->pluck('name'),
            'occupation' => $this->occupation()->pluck('name'),
            'diploma' => $this->diploma()->pluck('name'),
            'district' => $this->district,
            'speciality' => $this->speciality,
            'year' => $this->year,
            'slug' => $this->slug,
            'user' => $this->user,
            //'statusOnline' => $this->user->isOnline(),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
