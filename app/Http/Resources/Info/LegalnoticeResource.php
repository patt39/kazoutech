<?php

namespace App\Http\Resources\Info;

use Illuminate\Http\Resources\Json\JsonResource;

class LegalnoticeResource extends JsonResource
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
            'body' =>  $this->body,
            'ip' => $this->ip,
            'slug' => $this->slug,
            'status' => $this->status,
            'user' => $this->user,
            'statusOnline' => $this->user->isOnline(),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
