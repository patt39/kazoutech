<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryoccupationByStatusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
       $item =  $this->annonces()->with('user')->distinct()
           ->get()->toArray();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'subject' => $this->subject,
            'slug' => $this->slug,
            'photo' => $this->photo,
            'occupation' => $this->occupation,
            'annonces' => $item,
            'status' => $this->status,
            'description' => $this->description,
        ];
    }
}
