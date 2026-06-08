<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'date_naissance', 'telephone','email', 'photo', 'adresse'];

     protected $casts = [
        'date_naissance' => 'date',
    ];

    public function reservations() {

      return $this->hasMany(Reservation::class);
      
    }
}
