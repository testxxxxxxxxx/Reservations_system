<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table="room";
    protected $fillable=[

        "id",
        "number",
        "number_people",
        "equipment"

    ];

    public function Reservation()
    {
        return $this->belongsTo(Reservation::class);

    }

}
