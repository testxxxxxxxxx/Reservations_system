<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table="customers";
    protected $fillable=[

        'firstname',
        'surname',
        'number_phone',
        'address',
        'mail_address'

    ];

    public function Reservation()
    {
        return $this->belongsTo(Reservation::class);

    }

}
