<?php

namespace App\Model\admin\slide;

use App\Model\user\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class slidehome extends Model
{
    protected $guarded = [];

    protected $table = 'slidehomes';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'status' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            if (auth()->check()){
                $model->user_id = auth()->id();
            }
        });
        static::updating(function($model){
            if (auth()->check()){
                $model->user_id = auth()->id();
            }
        });
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
