<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravolt\Avatar\Avatar;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'avatar_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function songs()
    {
        return $this->hasMany('App\Model\Song');
    }

    public function playlists()
    {
        return $this->hasMany('App\Model\Playlist');
    }
    public function getAvatarPathAttribute()
    {
        if (empty($this->attributes['avatar'])) {
            return Avatar::create($this->attributes['name'])
                ->setDimension(30, 30)
                ->setFontSize(10)
                ->setShape('round')
                ->toBase64();
        }

        return $this->attributes['avatar'];
    }
}
