<?php

namespace App\Http\Resources\Partial;

use Illuminate\Http\Resources\Json\JsonResource;

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
           'created_at' => (string) $this->created_at,
           'updated_at' => (string) $this->updated_at,
       ];
    }
}
