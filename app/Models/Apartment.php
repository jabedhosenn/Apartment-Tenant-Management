<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'rent',
        'number_of_rooms',
        'image'
    ];

    protected $casts = [
        'rent' => 'decimal:2'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function currentBooking()
    {
        return $this->hasOne(Booking::class)
        ->whereDate('start_date', '<=', now())
        ->whereDate('end_date', '>=', now());
    }
}
