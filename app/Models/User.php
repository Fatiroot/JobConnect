<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'skill',
    ];

    public const STATUS_LABELS = [
        '1'=> 'Pending',
        '2'=> 'Accepted',
        '3'=> 'REFUSED',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function offers()
    {
        return $this->belongsToMany(Offre::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    
    public function formation()
    {
        return $this->hasMany(Formation::class);
    }

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
    ];
}
