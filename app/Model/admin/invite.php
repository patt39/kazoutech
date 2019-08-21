<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class invite extends Model
{


    protected $fillable = ['email', 'name', 'token'];

}
