<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'slug' => $this->slug,
            'user_id' => $this->user_id,
            'user' => $this->user,
            'statusOnline' => $this->user->isOnline(),
            'body' => $this->body,
            'title' => $this->title,
            'color' => $this->color,
            'status' => $this->status,
            'photo' => $this->photo,
            'occupation' => $this->occupation,
            'occupation_id' => $this->occupation_id,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
