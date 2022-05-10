<?php

namespace App\Model\admin;

use App\Model\user\technician;
use App\Model\user\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class city extends Model implements Auditable
{
    use AuditableTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'ip',
        'slug',
        'status',
        'photo',
        'city_vip',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            if (auth()->check()){
                $model->user_id = auth()->id();
            }
            $model->slug = str_slug($model->name);
        });
        static::updating(function($model){
            if (auth()->check()){
                $model->user_id = auth()->id();
            }
            $model->slug = str_slug($model->name);
        });
    }

    protected $casts = [
        'status' => 'boolean',
        'city_vip' => 'boolean',
    ];

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
                'source' => 'name'
            ]
        ];
    }

    public function occupation()
    {
        return $this->belongsTo(occupation::class);
    }

    public function technicians()
    {
        return $this->hasMany(technician::class);
    }

    public function annonces()
    {
        return $this->hasMany(annonce::class,'city_id');
    }

    public function taskuserassign()
    {
        return $this->hasMany(annonce::class,'city_id');
    }

    public function userbycities()
    {
        return $this->hasMany(User::class,'city_id');
    }
}
