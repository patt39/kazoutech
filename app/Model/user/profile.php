<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Contracts\Auditable;

class profile extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'status_profile',
        'status_online',
        'first_name',
        'last_name',
        'work',
        'sex',
        'age',
        'body',
        'color_style',
        'phone',
        'address'
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function($model){
            if (auth()->check()){
                $model->user_id = auth()->id();
            }
            $model->ip = request()->ip();
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
