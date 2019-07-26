<?php

namespace App\Model\admin;

use App\Model\user\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\Traits\LogsActivity;

class task extends Model
{

    use LogsActivity;


    protected $table = 'tasks';

    protected $fillable = ['user_id','administrator_id','progress','ip','progress','description'];
    protected static $logAttributes = ['user_id','administrator_id','progress','ip','progress','description'];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

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


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function note()
    {
        return $this->belongsTo(note::class);
    }

    public function administrator()
    {
        return $this->belongsTo(User::class,'administrator_id');
    }

    //public function notes()
    //{
    //    return $this->hasMany(note::class);
    //}

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}