<?php

namespace App\Model\admin;

use App\Model\user\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Overtrue\LaravelFollow\Traits\CanLike;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class annonce extends Model implements Auditable
{

    use CanBeLiked,CanLike,AuditableTrait;

    protected $guarded = [];

    protected $table = 'annonces';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    protected $casts = [
        'status' => 'boolean',
    ];

    public function categoryoccupation()
    {
        return $this->belongsTo(categoryoccupation::class,'categoryoccupation_id');
    }

    public function occupation()
    {
        return $this->belongsTo(occupation::class,'occupation_id');
    }

    public function city()
    {
        return $this->belongsTo(city::class,'city_id');
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
        });
        static::updating(function($model){
            if (auth()->check()){
                $model->user_id = auth()->id();
            }
        });
    }

    public function visits()
    {
        return visits($this);
    }

    public function getRouteKeyName()
    {
        return 'slug';
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
                'source' => 'title'
            ]
        ];
    }
}
