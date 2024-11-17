<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'id_user',
        'id_count_hours',
        'slug_booking',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function courtHour()
    {
        return $this->belongsTo(CourtHour::class, 'id_count_hours');
    }
}
