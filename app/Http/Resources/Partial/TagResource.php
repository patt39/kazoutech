<?php

namespace App\Http\Resources\Partial;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Gate;

class TagResource extends JsonResource
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
           'title' => $this->title,
           'status' => $this->status,
           'slug' => $this->slug,
           'user' => $this->user,
           'can' => $this->permissions(),
           'created_at' => (string) $this->created_at,
           'updated_at' => (string) $this->updated_at,
       ];
    }
    /**
     * Returns the permissions of the resource.
     *
     * @return array
     */
    protected function permissions()
    {
        return [
            'update' => Gate::allows('Edit-tag', $this->resource),
            'delete' => Gate::allows('delete', $this->resource),
            'open' => Gate::allows('open', $this->resource),
        ];
    }
}
