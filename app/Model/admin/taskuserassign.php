<?php

namespace App\Model\admin;

use App\Model\user\User;
use App\Model\admin\annonce;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class taskuserassign extends Model
{
    protected $table = 'taskuserassigns';

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    protected $casts = [
        'status' => 'boolean',
    ];

    public function member()
    {
        return $this->belongsTo(User::class,'member_id');
    }

    public function city()
    {
        return $this->belongsTo(User::class,'city_id');
    }


    public function annonce()
    {
        return $this->belongsTo(annonce::class,'annonce_id');
    }
    /**
     * save and deleting image
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $myslug = Str::uuid();
            if (auth()->check()){
                $model->member_id = auth()->id();
                $model->slug = $myslug;
            }
        });
        static::updating(function($model){
            if (auth()->check()){
                $model->member_id = auth()->id();
            }
        });
    }


    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

}

