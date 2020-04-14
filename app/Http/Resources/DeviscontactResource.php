<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeviscontactResource extends JsonResource
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
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
            'full_name' => $this->full_name,
            'status' => $this->status,
            'city' => $this->city,
            'occupation' => $this->occupation,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
