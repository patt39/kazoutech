<?php

namespace App\Model\user;

use App\Model\admin\city;
use App\Model\admin\occupation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class avischarbonneur extends Model
{
    protected $guarded = [];

    protected $table = 'avischarbonneurs';

    protected $casts = [
        'status' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $model->ip = request()->ip();
            $model->slug = Str::uuid();;
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }

}
