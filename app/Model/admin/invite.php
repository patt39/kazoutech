<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class invite extends Model
{
    use LogsActivity;

    protected $fillable = [
        'email',
        'name',
        'token'];
    protected static $logAttributes = [ 'email', 'name', 'token'];

}
