<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Room extends Model
{
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'price'
    ];


    public function room()
    {
        return $this->hasMany(Room::class);
    }
    protected $table = 'type_rooms';
}
