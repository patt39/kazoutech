<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnnonceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->user,
            'city' => $this->city,
            'city_id' => $this->city_id,
            'slug' => $this->slug,
            'title' => $this->title,
            'status' => $this->status,
            'body' => $this->body,
            'price' => $this->price,
            'photo' => $this->photo,
            'description' => $this->description,
            'occupation' => $this->occupation,
            'occupation_id' => $this->occupation_id,
            'categoryoccupation' => $this->categoryoccupation,
            'categoryoccupation_id' => $this->categoryoccupation_id,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
