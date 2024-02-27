<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offre extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'title',
        'description',
        'type_contract',
        'salary',
        'domain_id',
        'city_id',
    ];



    public const STATUS_LABELS = [
        '1'=> 'Pending',
        '2'=> 'Accepted',
        '3'=> 'Refused',
    ];
    // Dans votre modèle Offre

public function company(){
    return $this->belongsTo(Company::class);
}


public function domain()
{
    return $this->belongsTo(Domain::class);
}


    public function city(){
        return $this->belongsTo(City::class);
    }

    public function users()
    {
        $this->belongsToMany(User::class);
    }
}
