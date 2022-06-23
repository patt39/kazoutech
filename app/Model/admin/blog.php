<?php

namespace App\Model\admin;

use App\Model\user\technician;
use App\Model\user\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\admin\blogFactory;



class blog extends Model implements Auditable
{
    use AuditableTrait, HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected static function newFactory()
    {
        return blogFactory::new();
    }

    protected $guarded = [];

    /**
     * @return array
     */
    public function generateTags(): array
    {
        return [
            $this->user->name,
        ];
    }

    protected $casts = [
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function color()
    {
        return $this->belongsTo(color::class,'color_id');
    }

    public function occupation()
    {
        return $this->belongsTo(occupation::class,'occupation_id');
    }

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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function visits()
    {
        return visits($this);
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
                'source' => 'name'
            ]
        ];
    }
}
