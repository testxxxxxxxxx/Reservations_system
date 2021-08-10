<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table="reservations";
    protected $fillable=[

        'id_r',
        'id_c',
        'from',
        'to'

    ];

    public function Room()
    {
        return $this->hasOne(Room::class,'foreign_key');

    }
    public function Customer()
    {
        return $this->hasOne(Customer::class,'foreign_key');

    }

}
