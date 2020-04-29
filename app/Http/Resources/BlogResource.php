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
            'status' => $this->status,
            'photo' => $this->photo,
            'color' => $this->color,
            'color_id' => $this->color_id,
            'occupation' => $this->occupation,
            'occupation_id' => $this->occupation_id,
            'visits_count' => $this->visits()->count(),
            'visits_countries' => $this->visits()->countries(),
            'visits_languages' => $this->visits()->languages(),
            'visits_operatingSystems' => $this->visits()->operatingSystems(),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
