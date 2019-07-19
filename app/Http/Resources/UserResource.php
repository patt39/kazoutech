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
            'first_name' => $this->first_name,
            'sex' => $this->sex,
            'color_name' => $this->color_name,
            'company' => $this->company,
            'country_id' => $this->country_id,
            'my_status' => $this->my_status,
            'avatar' => $this->avatar,
            'edited_by' => $this->edited_by,
            'age' => $this->age,
            'phone' => $this->phone,
            'cap' => $this->cap,
            'body' => $this->body,
            'address' => $this->address,
            'twlink' => $this->twlink,
            'instalink' => $this->instalink,
            'fblink' => $this->fblink,
            'email_verified_at' => $this->email_verified_at,
            'provider' => $this->provider,
            'statusOnline' => $this->isOnline(),
            //'followings' => $this->followings()->get()->count(),
            //'followers' => $this->followers()->get()->count(),
            //'roles' => $this->roles()->pluck('name'),
            //'provider' => $this->provider,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
