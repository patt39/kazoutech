<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryOccupationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $annonces = $this->annonces()->with('occupation','user','city','categoryoccupation')
            ->whereIn('categoryoccupation_id',[$this->id])
            ->where(function ($q) {
                $q->whereIn('occupation_id',[$this->occupation_id])
                ->where('status',1);
            })->distinct()->get()->toArray();

        $annoncesinteres = $this->annonces()->with('occupation','user','city','categoryoccupation')
            ->whereIn('categoryoccupation_id',[$this->id])
            ->where(function ($q) {
                $q->whereIn('occupation_id',[$this->occupation_id])
                ->where('status',1)->orderBy('created_at','DESC')->take(3);
            })->distinct()->get()->toArray();

        return [
            'id' => $this->id,
            'photo' => $this->photo,
            'name' => $this->name,
            'subject' => $this->subject,
            'description' => $this->description,
            'body' => $this->body,
            'price' => $this->price,
            'status' => $this->status,
            'occupation_id' => $this->occupation_id,
            'occupation' => $this->occupation,
            'annonces' => $annonces,
            'annoncesinteres' => $annoncesinteres,
            'color' => $this->color,
            'color_id' => $this->color_id,
            'slug' => $this->slug,
            'user' => $this->user,
            'statusOnline' => $this->user->isOnline(),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
