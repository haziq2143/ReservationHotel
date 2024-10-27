<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'type_room_id',
        'room_number',
        'status',
        'floor',
        'image'
    ];

    public function type_room()
    {
        return $this->belongsTo(Type_Room::class);
    }
    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
