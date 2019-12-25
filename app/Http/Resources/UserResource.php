<?php

namespace App\Http\Resources;

use App\Model\user\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\Permission\Models\Role;

class UserResource extends JsonResource
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
            'username' => $this->username,
            'email' => $this->email,
            'sex' => $this->sex,
            'city' => $this->city,
            'color_name' => $this->color_name,
            'country_id' => $this->country_id,
            'my_status' => $this->my_status,
            'avatar' => $this->avatar,
            'email_verified_at' => $this->email_verified_at,
            'provider' => $this->provider,
            'charbonneur' => $this->charbonneur,
            'status_profile_verify' => $this->status_profile_verify,
            'city_id' => $this->city_id,
            'statusOnline' => $this->isOnline(),
            'followings' => $this->followings()->get()->count(),
            'followers' => $this->followers()->get()->count(),
            'roles' => $this->roles()->pluck('name'),
            'profile' => $this->profile,
            //'provider' => $this->provider,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
