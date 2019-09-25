<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Activitylog\Traits\LogsActivity;

class invite extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['email', 'name', 'token'];

}
