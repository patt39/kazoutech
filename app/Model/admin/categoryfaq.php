<?php

namespace App\Model\admin;

use App\Model\user\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Database\Factories\admin\categoryfaqFactory;
//use Spatie\Activitylog\LogOptions;

class categoryfaq extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name','user_id','ip','status'];
    // protected static $logAttributes = ['name','user_id','ip','status'];
    
    // public function getActivitylogOptions(): LogOptions
    // {
    //     return LogOptions::defaults()
    //     ->logOnly(['name']);
    //       logOnlyDirty()
    //     ->dontSubmitEmptyLogs();    
    // }

    protected static function newFactory()
    {
        return categoryfaqFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'status' => 'boolean',
    ];

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

    public function faqs()
    {
        return $this->hasMany(faq::class);
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
