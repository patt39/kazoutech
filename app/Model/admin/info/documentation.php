<?php

namespace App\Model\admin\info;

use App\Model\user\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\Traits\LogsActivity;

class documentation extends Model
{
    use LogsActivity;

    protected $table = 'documentations';
    protected $fillable = ['name','file','name_doc'];
    protected static $logAttributes = ['name'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * save and deleting image
     */
    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($model){
            if (auth()->check()){
                $model->user_id = auth()->id();
            }
            $model->ip = request()->ip();
        });
        static::updating(function($model){
            if (auth()->check()){
                $model->user_id = auth()->id();
            }
            $model->ip = request()->ip();
        });
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
                'source' => 'name',
                'separator' => '+'
            ]
        ];
    }


    public function getUploadPath()
    {
        //return 'documentation/'. $this->id .'/';
        return 'documentation' . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR;
    }


}
