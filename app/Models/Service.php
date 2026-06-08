<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;
    protected $fillable = ['nom', 'description','service_type_id'];

    public function service_types(){

        return $this->belongsTo(Service_types::class, 'service_type_id'); //l'id est nécéssaire si on ne suit pas la convention
    
    }
    
    public function reservations(){

        return $this->hasMany(Reservation::class);

    }
}
