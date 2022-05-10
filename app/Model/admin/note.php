<?php

namespace App\Model\admin;

use App\Model\user\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class note extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable,LogsActivity;


    protected $fillable = ['body','title','ip','slug','status'];
    protected static $logAttributes = ['user_id','body','title','ip','status'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['title']);
          logOnlyDirty()
        ->dontSubmitEmptyLogs();    
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //public function task()
    //{
    //    return $this->belongsTo(Task::class);
    //}

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            if (auth()->check()){
                $model->user_id = auth()->id();
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


    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
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
                'source' => 'title',
                'separator' => '+'
            ]

        ];
    }
}
