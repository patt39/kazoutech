<?php

namespace App\Model\user;

use App\Model\admin\country;
use App\Notifications\RegisteredUsers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,HasApiTokens,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard_name = 'web';
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'work',
        'sex',
        'age',
        'email',
        'body',
        'username',
        'color_name',
        'color_style',
        'phone',
        'cap',
        'avatar',
        'avatarcover',
        'address',
        'country_id'
    ];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        self::creating(function ($model){
            $model->ip = request()->ip();
        });
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new RegisteredUsers());
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
}
