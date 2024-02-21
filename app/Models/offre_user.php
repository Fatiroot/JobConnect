<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class offre_user extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'application_date',
        'description',
        'offre_id',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }
}
