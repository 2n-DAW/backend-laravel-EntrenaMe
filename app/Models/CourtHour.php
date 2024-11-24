<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtHour extends Model
{
    use HasFactory;

    protected $table = 'courts_hours';
     
    protected $primaryKey = 'id_court_hour';

    public $timestamps = false;


    protected $fillable = [
        'id_court_hour',
        'id_court',
        'id_hour',
        'id_month',
        'day_number',
        'slug_court_hour',
    ];

    public function court()
    {
        return $this->belongsTo(Court::class, 'id_court');
    }

    public function hour()
    {
        return $this->belongsTo(Hour::class, 'id_hour');
    }
    public function month()
    {
        return $this->belongsTo(Month::class, 'id_month');
    }
}
