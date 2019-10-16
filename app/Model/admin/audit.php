<?php

namespace App\Model\admin;

use App\Model\user\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class audit extends Model
{
    protected $table = 'audits';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
