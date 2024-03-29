<?php

namespace App;

use App\Mail\BareMail;
use App\Notifications\PasswordResetNotification;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Password;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function shops():HasMany
    {
        return $this->hasmany('App\Shop');
    }

    public function reviews():HasMany
    {
        return $this->hasmany('App\Review');
    }

    public function likes():BelongsToMany
    {
        return $this->belongsToMany('App\Shop','likes')->withTimestamps();
    }

    public function sendPasswordResetNotification($token){
        $this->notify(new PasswordResetNotification($token, new BareMail()));
    }
}
