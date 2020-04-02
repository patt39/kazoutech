<?php

namespace App\Model\user;

use App\Mail\NewUserWelcomeMail;
use App\Model\admin\annonce;
use App\Model\admin\blog;
use App\Model\admin\city;
use App\Model\admin\country;
use App\Model\admin\occupation;
use App\Model\admin\task;
use App\Model\admin\taskuserassign;
use App\Notifications\VerifyEmailUsers;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Laravel\Passport\HasApiTokens;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanLike;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail,Auditable
{
    use Notifiable,HasApiTokens,HasRoles,CanFollow,CanLike,CanBeFollowed,AuditableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard_name = 'web';
    protected $fillable = [
        'name',
        'email',
        'username',
        'color_name',
        'avatar',
        'avatarcover',
        'charbonneur',
        'status_profile_verify',
        'phone',
        'day',
        'month',
        'year',
        'password',
        'country_id',
        'city_id',
        'occupation_id',
        'sex',
        'cni',
        'cni_picture',
        'notifier_plans',
        'notifier_newletter',
    ];

    protected $dates = ['deleted_at'];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status_profile_verify' => 'boolean',
        'notifier_newletter' => 'boolean',
        'charbonneur' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            // Add role to the user
            $user->syncRoles('1');
            $user->technician()->create([
                'slug' => $user->username,
            ]);
            $user->profile()->create([
                'first_name' => $user->name,
            ]);
        });
        static::updating(function($user){
            $user->technician()->update([
                'slug' => $user->username,
            ]);
        });
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailUsers());
    }

    public function visits()
    {
        return visits($this);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }


    public function my_country()
    {
        return $this->belongsTo(country::class,'country_id');
    }

    public function getRouteKeyName()
    {
        return 'username';
    }


    public function tasks()
    {
        return $this->hasMany(task::class,'administrator_id');
    }

    public function technician()
    {
        return $this->hasOne(technician::class);
    }

    public function profile()
    {
        return $this->hasOne(profile::class,'user_id');
    }

    public function city()
    {
        return $this->belongsTo(city::class,'city_id');
    }
 
    public function taskuserassign()
    {
        return $this->belongsTo(city::class,'taskuserassign_id');
    }

    public function occupation()
    {
        return $this->belongsTo(occupation::class,'occupation_id');
    }

    public function annonces()
    {
        return $this->hasMany(annonce::class,'user_id');
    }

    public function blogs()
    {
        return $this->hasMany(blog::class,'user_id');
    }
}
