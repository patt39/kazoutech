<?php

namespace App\Model\admin\page;

use App\Model\user\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Activitylog\Traits\LogsActivity;

class about extends Model implements Auditable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use LogsActivity,\OwenIt\Auditing\Auditable;

    protected $fillable = ['first_name',
        'twlink',
        'fblink',
        'instlink',
        'last_name',
        'user_id',
        'ip',
        'status',
        'photo',
        'role',
        'description'
    ];
    protected static $logAttributes = [
        'first_name',
        'twlink',
        'fblink',
        'instlink',
        'last_name',
        'user_id',
        'ip',
        'status',
        'photo',
        'role',
        'description'
    ];

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

    /**
     * save and deleting image
     */
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
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'first_name'
            ]
        ];
    }
}
