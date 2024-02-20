<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'name',
        'description',
        'phone',
        'adress',
        'user_id',

    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function offres()
    {
        return $this->hasMany(Offre::class);
    }

}
