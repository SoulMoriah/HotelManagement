<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }
    function room()
    {
        return $this->belongsTo(Room::class);
    }
}
