<?php

namespace App\Http\Resources\User\Partial;

use Illuminate\Http\Resources\Json\JsonResource;

class ColorByStatusResource extends JsonResource
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
            'name' => $this->name,
            'color_name' => $this->color_name,
        ];
    }
}
