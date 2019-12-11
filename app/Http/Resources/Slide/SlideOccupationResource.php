<?php

namespace App\Http\Resources\Slide;

use Illuminate\Http\Resources\Json\JsonResource;

class SlideOccupationResource extends JsonResource
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
            'user' => $this->user,
            'status' => $this->status,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'type_header' => $this->type_header,
            'statusOnline' => $this->user->isOnline(),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
