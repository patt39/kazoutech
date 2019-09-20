<?php

namespace App\Model\admin;

use App\Model\user\User;
use Illuminate\Database\Eloquent\Model;

class audit extends Model
{
    protected $table = 'audits';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }



}
