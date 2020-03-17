<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FaqOccupationResource extends JsonResource
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
            'ip' => $this->ip,
            'slug' => $this->slug,
            'user' => $this->user,
            'statusOnline' => $this->user->isOnline(),
            'body' => $this->body,
            'title' => $this->title,
            'status' => $this->status,
            'occupation' => $this->occupation,
            'occupation_id' => $this->occupation_id,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
