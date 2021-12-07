<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'user_id');
    }

    public function logins()
    {
        return $this->hasMany(Login::class);
    }

    public function latestLogin()
    {
        return $this->hasOne(Login::class, 'user_id')
            ->latestOfMany('logged_in_at');
    }

    public function isAdmin(): bool
    {
        return $this->type === 'admin';
    }

    public function isNormal(): bool
    {
        return $this->type === 'normal';
    }
}
