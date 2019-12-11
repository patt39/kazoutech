<?php

namespace App\Http\Resources\User\Partial;

use Illuminate\Http\Resources\Json\JsonResource;

class SlideOccupationBySatusResource extends JsonResource
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
            'status' => $this->status,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'type_header' => $this->type_header,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
