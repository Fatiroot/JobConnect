<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, SoftDeletes, HasFactory, Notifiable, InteractsWithMedia;

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
        'status',
    ];

    public const STATUS_LABELS = [
        '1'=> 'Pending',
        '2'=> 'Accepted',
        '3'=> 'Refused',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function offres()
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

 
//  protected static function boot()
//     {
//         parent::boot();

//         static::created(function ($user) {

//             $defaultRole = Role::where('name', 'user')->first();
//             if ($defaultRole) {
//                 $user->roles()->attach($defaultRole->id);
//             }
//         });
//     }
}
