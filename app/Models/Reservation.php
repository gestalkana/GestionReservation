<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;
    
    protected $fillable = [
        'client_id',
        'service_id',
        'reservation_date',
        'status',
        'note'
    ];

    protected $casts = ['reservation_date' => 'datetime'];

    public function service() {

        return $this->belongsTo(Service::class);

    }

    public function client() {
        return $this->belongsTo(Client::class);
    }
}
