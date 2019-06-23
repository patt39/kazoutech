<?php

namespace App\Model\admin;

use App\Model\user\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\Traits\LogsActivity;

class faq extends Model
{
   use LogsActivity;

  protected $fillable = ['body','title','categoryfaq_id'];
  protected static $logAttributes = ['user_id','body','title','categoryfaq_id','ip'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        self::creating(function ($model){
            $model->ip = request()->ip();
        });
    }


    public function categoryfaq()
    {
        return $this->belongsTo(Categoryfaq::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    use Sluggable;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'separator' => '+'
            ]

        ];
    }
}
