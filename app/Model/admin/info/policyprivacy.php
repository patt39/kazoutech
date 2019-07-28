<?php

namespace App\Model\admin\info;

use App\Model\user\User;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class policyprivacy extends Model
{
    protected $table = 'policyprivacies';
    protected $dates = ['updated_at'];

    protected $fillable = ['body','slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        self::creating(function ($model){

            if (auth()->check()){
                $model->user_id = auth()->id();
            }
            $model->ip = request()->ip();
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
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
                'source' => 'ip',
                'separator' => '+'
            ]
        ];
    }
}
