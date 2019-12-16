<?php

namespace App\Model\admin;

use App\Model\user\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Activitylog\Traits\LogsActivity;

class faq extends Model implements Auditable
{
   use LogsActivity,AuditableTrait;

  protected $fillable = ['body','title','categoryfaq_id','status'];
  protected static $logAttributes = ['user_id','body','title','categoryfaq_id','ip','status'];

    /**
     * @return array
     */
    public function generateTags(): array
    {
        return [
            $this->user->name,
        ];
    }

    public static function faqId(string $id): self
    {
        return static::where('id', $id)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

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



    public function categoryfaq()
    {
        return $this->belongsTo(Categoryfaq::class);
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
