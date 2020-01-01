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

        $categoryoccupationsadmin =  $this->categoryoccupations()->with('occupation','user','color')
            ->whereIn('occupation_id',[$this->id])->distinct()->get()->toArray();


        $categoryoccupations =  $this->categoryoccupations()->with('occupation','user','color')
            ->whereIn('occupation_id',[$this->id])
            ->where(function ($q) {
                $q->where('status',1);
            })->distinct()->get()->toArray();


        $blogbycategories =  $this->blogs()->with('occupation','user')
            ->whereIn('occupation_id',[$this->id])
            ->where(function ($q) {
                $q->where('status',1);
            })->distinct()->get()->toArray();


        $annonces =  $this->annonces()->with('user','occupation','city','categoryoccupation')
            ->whereIn('occupation_id',[$this->id])
            ->where(function ($q) {
                $q->where('status',1);
            })->distinct()->get()->toArray();


        $users =  $this->userbycities()->with('city')
            ->distinct()->get()->toArray();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'slug' => $this->slug,
            'photo' => $this->photo,
            'description' => $this->description,
            'users' => $users,
            'categoryoccupations' => $categoryoccupations,
            'categoryoccupationsadmin' => $categoryoccupationsadmin,
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
