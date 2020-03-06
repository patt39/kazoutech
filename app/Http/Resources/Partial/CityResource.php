<?php

namespace App\Http\Resources\Partial;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
      //$annonces =  $this->annonces()->with('user','occupation','city','categoryoccupation')
      //    ->distinct()->get()->toArray();

      //$users =  $this->userbycities()->with('city')
      //    ->where(function ($q) {
      //        $q->whereIn('city_id',[$this->id])
      //            ->where('charbonneur',1)
      //            ->with('city');
      //    })->distinct()->get()->toArray();


        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'city_vip' => $this->city_vip,
            'photo' => $this->photo,
            'slug' => $this->slug,
            //'annonces' => $annonces,
            //'users' => $users,
            'statusOnline' => $this->user->isOnline(),
            //'technician_count' => $this->technicians()->get()->count(),
            'user' => $this->user,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
