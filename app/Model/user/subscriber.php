<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class subscriber extends Model
{



    protected $fillable =[
      'email','ip','user_email'
    ];

    protected static function boot()
    {
        parent::boot();

        self::saving(function ($model){
            $model->ip = request()->ip();
        });
    }

}
