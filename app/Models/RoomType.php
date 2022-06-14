<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    function roomtypeimages(){
        return $this->hasMany(Roomtypeimage::class,'room_type_image_id');
    }
}
