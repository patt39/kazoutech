<?php

namespace App\Http\Resources\Partial;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Gate;

class TagResource extends JsonResource
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
           'title' => $this->title,
           'status' => $this->status,
           'slug' => $this->slug,
           'user' => $this->user,
           'statusOnline' => $this->user->isOnline(),
           'created_at' => (string) $this->created_at,
           'updated_at' => (string) $this->updated_at,
       ];
    }
}
