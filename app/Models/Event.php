<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name', 'short_description', 'detailed_description', 'event_date',
        'venue', 'ticket_cost', 'event_image', 'meta_title', 
        'meta_description', 'meta_keywords', 'slug'
    ];

    // Define relationships
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
