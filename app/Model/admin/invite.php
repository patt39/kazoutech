<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class invite extends Model
{
    protected $fillable = [
        'email',
        'name',
        'token'
    ];
}
