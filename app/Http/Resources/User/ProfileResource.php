<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'status_online' => $this->status_online,
            'sex' => $this->sex,
            'status_profile' => $this->status_profile,
            'company' => $this->company,
            'my_status' => $this->my_status,
            'age' => $this->age,
            'phone' => $this->phone,
            'user' => $this->user,
            'cap' => $this->cap,
            'body' => $this->body,
            'address' => $this->address,
            'twlink' => $this->twlink,
            'instalink' => $this->instalink,
            'fblink' => $this->fblink,
            'provider' => $this->provider,
            'statusOnline' => $this->isOnline(),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
