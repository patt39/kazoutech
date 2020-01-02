<?php

namespace App\Http\Resources\Slide;

use Illuminate\Http\Resources\Json\JsonResource;

class SlideHomeResource extends JsonResource
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
            'photo' => $this->photo,
            'user_id' => $this->user_id,
            'description' => $this->description,
            'color_link' => $this->color_link,
            'text_link' => $this->text_link,
            'redirect_link' => $this->redirect_link,
            'statusOnline' => $this->user->isOnline(),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
