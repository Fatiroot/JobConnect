<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model implements HasMedia
{
    use HasFactory, SoftDeletes,Notifiable, InteractsWithMedia;
    protected $fillable=[
        'name',
        'description',
        'phone',
        'adress',

    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function offres()
    {
        return $this->hasMany(Offre::class);
    }

}
