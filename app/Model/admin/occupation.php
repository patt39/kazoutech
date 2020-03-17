<?php

namespace App\Model\admin;

use App\Model\user\technician;
use App\Model\user\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Redactors\LeftRedactor;

class occupation extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

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

    /**
     * Attribute modifiers.
     *
     * @var array
     */
    //protected $attributeModifiers = [
    //    'name' => LeftRedactor::class,
    //];

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
                'source' => 'name'
            ]
        ];
    }

    public function city()
    {
        return $this->belongsTo(city::class);
    }

    public function categoryoccupations()
    {
        return $this->hasMany(categoryoccupation::class,'occupation_id');
    }

    public function blogs()
    {
        return $this->hasMany(blog::class,'occupation_id');
    }


    public function technicians()
    {
        return $this->hasMany(technician::class);
    }

    public function annonces()
    {
        return $this->hasMany(annonce::class,'occupation_id');
    }


    public function userbycities()
    {
        return $this->hasMany(User::class,'city_id');
    }

    public function userbyoccupations()
    {
        return $this->hasMany(User::class,'occupation_id');
    }

    public function faqoccupations()
    {
        return $this->hasMany(faqoccupation::class,'occupation_id');
    }
}
