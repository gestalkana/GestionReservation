<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_types extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'code'];

    public function service(){

        return $this->hasMany(Service::class);
        
    }
}
