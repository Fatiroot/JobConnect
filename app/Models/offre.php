<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;

class Offre extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, Notifiable, InteractsWithMedia;  
      protected $fillable=[
        'title',
        'description',
        'type_contract',
        'salary',
        'company_id',
        'domain_id',
        'city_id',
        'status',
    ];



    public const STATUS_LABELS = [
        '1'=> 'Pending',
        '2'=> 'Accepted',
        '3'=> 'Refused',
        '4'=> 'Awaiting Approval', // Nouveau statut ajouté
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

    public function pendingCandidates()
{
    return $this->belongsToMany(User::class, 'offre_users', 'offre_id', 'user_id')
                ->withPivot('status', 'application_date', 'description')
                ->wherePivot('status', '=', 1); // Si 1 représente "en attente"
}

}
