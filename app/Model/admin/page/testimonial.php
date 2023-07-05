<?php

namespace App\Model\admin\page;

use App\Model\user\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Contracts\Auditable;
//use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class testimonial extends Model 
{

    //use LogsActivity,\OwenIt\Auditing\Auditable;
    protected static $logAttributes = ['body', 'ip', 'user_id','status'];

    protected $fillable = ['body','user_id','ip','status'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['body']);
          logOnlyDirty()
        ->dontSubmitEmptyLogs();    
    }

    /**
     * @return array
     */
    public function generateTags(): array
    {
        return [
            $this->user->name,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model){

            if (auth()->check()){
                $model->user_id = auth()->id();
            }
            $model->ip = request()->ip();
        });
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    use Sluggable;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'role',
                'separator' => '+'
            ]
        ];
    }
}
