<?php

namespace App\Model\admin;

use App\Model\user\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\admin\categoryoccupationFactory;


class categoryoccupation extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected $table = 'categoryoccupations';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function occupation()
    {
        return $this->belongsTo(occupation::class,'occupation_id');
    }

    public function color()
    {
        return $this->belongsTo(color::class,'color_id');
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
                $model->slug = str_slug($model->name);
            }
        });
    }

    protected $casts = [
        'status' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function annonces()
    {
        return $this->hasMany(annonce::class,'categoryoccupation_id');
    }

    public function occupations()
    {
        return $this->hasMany(occupation::class,'categoryoccupation_id');
    }


    protected static function newFactory()
{
    return categoryoccupationFactory::new();
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
