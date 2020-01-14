<?php

namespace App\Http\Resources\Info;

use Illuminate\Http\Resources\Json\JsonResource;

class ConditionResource extends JsonResource
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
            'title' => $this->title,
            'body' => $this->body,
            'user' => $this->user,
            'statusOnline' => $this->user->isOnline(),
            'slug' => $this->slug,
            'status' => $this->status,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
