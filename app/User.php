<?php

namespace App;

use App\Mail\VerifyEmail;
use App\Notifications\UpdateEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Laravel\Sanctum\Contracts\HasApiTokens as HasApiTokensContract;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail, HasApiTokensContract
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function roles(): HasMany
    {
        return $this->hasMany(Role::class);
    }

    public function institutions()
    {
        return $this->hasManyThrough(Institution::class, Role::class);
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(MediaContent::class, 'favorites', '');
    }

    public function favorite(MediaContent $mediaContent)
    {
        return $this->favorites()->attach($mediaContent);
    }

    public function unfavorite(MediaContent $mediaContent)
    {
        return $this->favorites()->detach($mediaContent);
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    public function sendEmailUpdateNotification($newEmail)
    {
        Notification::route('mail', $newEmail)
            ->notify(new UpdateEmail($this->id, $newEmail));
    }
}
