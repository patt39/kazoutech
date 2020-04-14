<?php

namespace App\Model\user;

use App\Model\admin\city;
use App\Model\admin\occupation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class deviscontact extends Model
{
    protected $guarded = [];

    protected $table = 'deviscontacts';

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

    public function occupation()
    {
        return $this->belongsTo(occupation::class,'occupation_id');
    }

    public function city()
    {
        return $this->belongsTo(city::class,'city_id');
    }
}
