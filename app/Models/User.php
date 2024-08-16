<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Laravel Gravatar profile Image Request

    protected $appends = ['avatar'];

    public function getAvatarAttribute() {
        return "https://gravatar.com/avatar/" . md5( strtolower( trim( $this-> email) ) );
    }

    public function isAdmin()
    {
        // return $this->roles()->where('name', 'creator')->exists();
        return $this->hasRole('Admin');
    }

    public function isUser()
    {        
        return $this->hasRole('User');
    }

    public function isCreator()
    {        
        return $this->hasRole('Creator');
    }

    public function songs() {
        return $this->hasMany(Song::class);
    }

    /**
     * Get the songs played by this user.
     */
    public function songHistories()
    {
        return $this->hasMany(SongHistory::class);
    }
}
