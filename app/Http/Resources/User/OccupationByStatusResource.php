<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OccupationByStatusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $categoryoccupations =  $this->categoryoccupations()->with('occupation','user')
            ->distinct()->get()->toArray();

        $blogbycategories =  $this->blogs()->with('occupation','user')
            ->distinct()->get()->toArray();

        $annoncebycategories =  $this->annonces()->with('user','occupation','city','categoryoccupation')
            ->distinct()->get()->toArray();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'photo' => $this->photo,
            'user' => $this->user,
            'categoryoccupations' => $categoryoccupations,
            'blogs' => $blogbycategories,
            'annonces' => $annoncebycategories,
            'status' => $this->status,
            'description' => $this->description,
        ];
    }
}
