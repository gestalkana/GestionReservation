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

        return $this->belongsTo(Service_types::class);
    
    }
}
