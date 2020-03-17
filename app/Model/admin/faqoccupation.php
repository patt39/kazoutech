<?php

namespace App\Model\admin;

use App\Model\user\User;
use Illuminate\Database\Eloquent\Model;

class faqoccupation extends Model
{
    protected $table = 'faqoccupations';

    protected $guarded = [];


    protected $casts = [
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
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

}
