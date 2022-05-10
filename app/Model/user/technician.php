<?php

namespace App\Model\user;

use App\Model\admin\city;
use App\Model\admin\occupation;
use App\Model\user\profile;
use App\Model\admin\partial\diploma;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class technician extends Model implements Auditable
{
    use LogsActivity,\OwenIt\Auditing\Auditable;

    protected $fillable = [
        'district',
        'member_id',
        'city_id',
        'user_id',
        'title',
        'year',
        'slug',
        'speciality',
        'diploma_id',
        'occupation_id',
        'status'
    ];
    protected static $logAttributes = [
        'district',
        'member_id',
        'city_id',
        'user_id',
        'title',
        'year',
        'speciality',
        'diploma_id',
        'occupation_id',
        'status'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['speciality']);
          logOnlyDirty()
        ->dontSubmitEmptyLogs();    
    }


    public function member()
    {
        return $this->belongsTo(User::class,'member_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            if (auth()->check()){
                $model->member_id = auth()->id();
            }
            $model->ip = request()->ip();
        });
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

    public function city()
    {
        return $this->belongsTo(city::class);
    }

    public function occupation()
    {
        return $this->belongsTo(occupation::class);
    }

    public function diploma()
    {
        return $this->belongsTo(diploma::class);
    }

    public function profile()
    {
        return $this->belongsTo(profile::class);
    }



    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
