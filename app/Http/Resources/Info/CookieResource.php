<?php

namespace App\Http\Resources\Info;

use Illuminate\Http\Resources\Json\JsonResource;

class CookieResource extends JsonResource
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
            'body' => $this->body,
            'title' => $this->title,
            'slug' => $this->slug,
            'status' => $this->status,
            'user' => $this->user,
            'statusOnline' => $this->user->isOnline(),
            'color_name' => $this->color_name,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
