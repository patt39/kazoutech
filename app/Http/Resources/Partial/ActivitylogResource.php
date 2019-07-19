<?php

namespace App\Http\Resources\Partial;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivitylogResource extends JsonResource
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
            'log_name' => $this->log_name,
            'description' => $this->description,
            'subject_id' => $this->subject_id,
            'subject_type' => $this->subject_type,
            'causer_id' => $this->causer_id,
            'causer_type' => $this->causer_type,
            'properties' => $this->properties,
            'user' => $this->user,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
