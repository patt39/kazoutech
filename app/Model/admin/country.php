<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class country extends Model
{

    use LogsActivity;

    protected $fillable = [ 'code', 'name','flag'];
    protected static $logAttributes = ['code', 'name','flag'];

    protected $table = 'countries';


    // Timestamps
    public $timestamps = false;

    //public function user()
    //{
    //    return $this->belongsTo(User::class);
    //}
}
