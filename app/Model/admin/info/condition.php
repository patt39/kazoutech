<?php

namespace App\Model\admin\info;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class condition extends Model
{
    use LogsActivity;

    protected $table = 'conditions';
    protected $fillable = ['title', 'body','photo'];
    protected static $logAttributes = ['title','body'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    /**
     * save and deleting image
     */
   public static function boot()
   {
       parent::boot();
       self::creating(function ($model){

           if (auth()->check()){
               $model->user_id = auth()->id();
           }
           $model->ip = request()->ip();
       });
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
