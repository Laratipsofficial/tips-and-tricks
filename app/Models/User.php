<?php

namespace App\Models;

use App\Enums\UserTypeEnum;
use App\Mail\NewPasswordChangedNotificationMail;
use Asdh\PasswordChangedNotification\Contracts\PasswordChangedNotificationContract;
use Asdh\PasswordChangedNotification\Traits\PasswordChangedNotificationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements PasswordChangedNotificationContract
{
    use HasFactory, Notifiable, PasswordChangedNotificationTrait;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'type' => UserTypeEnum::class,
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

    public function passwordChangedNotificationMail(): Mailable
    {
        return new NewPasswordChangedNotificationMail;
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
    }
}
