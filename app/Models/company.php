<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Testing\Fluent\Concerns\Interaction;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use HasFactory, SoftDeletes,Notifiable,InteractsWithMedia;
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
