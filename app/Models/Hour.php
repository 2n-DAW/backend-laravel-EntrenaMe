<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;

    protected $table = 'hours';

    protected $fillable = [
        'slot_hour',
    ];

    public function courtHours()
    {
        return $this->hasMany(CourtHour::class, 'id_hour');
    }
}
