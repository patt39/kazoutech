<?php

namespace App\Http\Resources\Collection\Partial;

use App\Model\admin\color;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Gate;

class ColorCollection extends ResourceCollection
{

    public static $wrap = 'colors';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'data' => $this->collection->transform(function ($color){
                return[

                    'id' => $color->id,
                    'name' => $color->name,
                    'color_name' => $color->color_name,
                    'status' => $color->status,
                    'slug' => $color->slug,
                    'user' => $color->user,
                    'statusOnline' => $color->user->isOnline(),
                    'created_at' => (string) $color->created_at,
                    'updated_at' => (string) $color->updated_at,
                ];
            })
        ];
    }

    public function with($request)
    {
        return [
            'can' => [
                'create' => Gate::allows('create', Color::class),
            ],
        ];
    }
}
