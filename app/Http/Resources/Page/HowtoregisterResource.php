<?php

namespace App\Http\Resources\Info\Page;

use Illuminate\Http\Resources\Json\JsonResource;

class HowtoregisterResource extends JsonResource
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
            'icon' => $this->icon,
            'title' => $this->title,
            'icon_number' => $this->icon_number,
            'body' => $this->body,
            'image' => $this->image,
            'color_name' => $this->color_name,
            'slug' => $this->slug,
            'status' => $this->status,
            'user' => $this->user,
            'statusOnline' => $this->user->isOnline(),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
