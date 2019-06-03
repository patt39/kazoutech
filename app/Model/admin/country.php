<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'code', 'name','flag'
    ];

    // Timestamps
    public $timestamps = false;

    //public function user()
    //{
    //    return $this->belongsTo(User::class);
    //}
}
