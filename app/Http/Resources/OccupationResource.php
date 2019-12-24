<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OccupationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $categoryoccupations =  $this->categoryoccupations()->with('occupation','user','color')
            ->distinct()->get()->toArray();

        $blogbycategories =  $this->blogs()->with('occupation','user')
            ->distinct()->get()->toArray();

        $annonces =  $this->annonces()->with('user','occupation','city','categoryoccupation')
            ->distinct()->get()->toArray();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'slug' => $this->slug,
            'photo' => $this->photo,
            'description' => $this->description,
            'categoryoccupations' => $categoryoccupations,
            'blogs' => $blogbycategories,
            'annonces' => $annonces,
            'user' => $this->user,
            'statusOnline' => $this->user->isOnline(),
            'technician_count' => $this->technicians()->get()->count(),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
