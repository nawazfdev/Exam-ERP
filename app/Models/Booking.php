<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'guests',
        'total_price',
        'first_name',
        'last_name',
        'email',
        'phone',
        'street',
        'city',
        'state',
        'country',
        'status',
        'special_requests',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }



}
