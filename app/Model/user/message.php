<?php

namespace App\Model\user;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{

    public $fillable = [
        'mail',
        'ip',
        'from_id',
        'to_id',
        'message'
    ];

    public function from()
    {
        return $this->belongsTo(User::class,'from_id');
    }

    public function to()
    {
        return $this->belongsTo(User::class,'to_id');
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            $model->ip = request()->ip();
        });
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
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'object'
            ]
        ];
    }
}
