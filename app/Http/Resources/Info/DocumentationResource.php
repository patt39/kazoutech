<?php

namespace App\Http\Resources\Info;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentationResource extends JsonResource
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
            'name' => $this->name,
            'name_doc' => $this->name_doc,
            'user' => $this->user,
            'statusOnline' => $this->user->isOnline(),
            'slug' => $this->slug,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
